<?php
namespace App\Http\Controllers;

use App\Factura;
use App\Http\Traits\trait1;
use App\Pago;
use App\pagoporlote;
use App\Paquete;
use App\Promocion;
use App\User;
use App\Useranunciante;
use Auth;
use DB;
use Fahim\PaypalIPN\PaypalIPNListener;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class PaypalController extends BaseController
{
    use trait1;
    
    private $_api_context;
    protected $telegram;
    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf        = \Config::get('paypal');
        $this->
telegram     = new Api('642406866:AAHMJndO_QhFzliHewOLUvPUtFZOMhjZZtI');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function ContratarDias()
    {
        \Session::put('seccion_actual', "ContratarDias");
        $promociones = Promocion::where('status',1)->get();
        $pagos       = Pago::where('iduser', Auth::user()->id)
            ->orderBy('fecha_pago', 'DESC')
            ->paginate(10);
        return view("anunciante.ingresoDias", ["pagos" => $pagos, "promociones" => $promociones]);
    }

    public function pruebaIPN()
    {
        return view('paypal.prueba');
    }

    public function paypalIpn()
    {
        $ipn              = new PaypalIPNListener();
        $ipn->use_sandbox = true;

        $verified = $ipn->processIpn();

        $report = $ipn->getTextReport();
        dd($ipn);
        Log::info("-----new payment-----");

        Log::info($report);

        if ($verified) {
            if ($_POST['address_status'] == 'confirmed') {
                // Check outh POST variable and insert your logic here
                Log::info("payment verified and inserted to db");
            }
        } else {
            Log::info("Some thing went wrong in the payment !");
        }
    }

/**
 *
 * crea un pago contra un email el cual debe existir y es automáticamente aceptado
 *
 */
    public function crearPAGOxLOTES(Request $request)
    {
        \Session::put('seccion_actual', "pagosxlotes");
        $payouts           = new \PayPal\Api\Payout();
        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        $totalcargos       = 0;
        $facturas[]        = new Factura;
        if (count($request->get('selUsu')) > 0) {
            $senderBatchHeader->setSenderBatchId(uniqid()) //lote único últimos 30 días o será rechazado
                ->setEmailSubject("PAGO DES EADP");
            $factus = $request->get('selUsu');
            foreach ($factus as $fac) {
                $factura = new Factura();
                $factura = Factura::findorfail($fac);
                array_push($facturas, $factura);
                $usuario = User::findorfail($factura->idusuario);
                $totalcargos += $factura->importefactura;
                $senderItem = new \PayPal\Api\PayoutItem();
                $senderItem->setRecipientType('Email')
                    ->setNote('Nuevo pago mensual de ventas de EADP.')
                    ->setReceiver($usuario->cuentapaypal)
                    ->setSenderItemId($factura->idfactura) //único para cada lote o será rechazado
                    ->setAmount(new \PayPal\Api\Currency('{
                "value":' . $factura->importefactura . ',
                "currency":"EUR"
            }'));

                $payouts->setSenderBatchHeader($senderBatchHeader)->addItem($senderItem);
            }
            try {
                $output               = $payouts->createSynchronous($this->_api_context);
                $pxl                  = new pagoporlote();
                $pxl->payout_batch_id = $output->batch_header->payout_batch_id;
                $pxl->importecargado  = $totalcargos;
                $pxl->importecobrado  = 0;
                $pxl->estado          = $output->batch_header->batch_status;
                $pxl->save();

                //dd($output->batch_header->payout_batch_id);
                foreach ($facturas as $factura) {
                    $factura->idlotepago = $output->batch_header->payout_batch_id;
                    $factura->update();
                }
            } catch (PayPalConnectionException $ex) {
                echo $ex->getData();
                exit;
            }
        }
        return \Redirect::to('/admin/listarPxL');
    }

    public function listarPxL()
    {
        $pxls = pagoporlote::all();
        \Session::put('seccion_actual', "listarpagos");
        foreach ($pxls as $pxl) {
            $cobrado = 0;
            if ($pxl->estado == "PENDING" or $pxl->estado == "PROCESSING") {
                $output = \PayPal\Api\Payout::get($pxl->payout_batch_id, $this->_api_context);
                if ($output->batch_header->batch_status == "SUCCESS") {
                    $pxl->estado = $output->batch_header->batch_status;

                    foreach ($output->items as $item) {
                        $factura = Factura::findorfail($item->payout_item->sender_item_id);

                        if ($item->transaction_status == "SUCCESS") {
                            $factura->pagada = 1;
                            $cobrado += $item->payout_item->amount->value;
                        } else {
                            $factura->idlotepago = "";
                        }
                        $factura->update();
                    }
                    $pxl->importecobrado = $cobrado; //$output->batch_header->amount->value;
                    $pxl->save();
                } else {
                    $pxl->importecobrado = "0";
                }
            }

        }
        $menu = $this->MenuIzquierdo(4);
        return view('admin.PagoxLotes.index', ["pxls" => $pxls, "menu" => $menu]);
    }

    public function postPayment(Request $request)
    {
        $id         = $request->get('pro');
        $promocion  = Promocion::findorfail($id);
        $importe    = $promocion[0]->importe;
        $dias       = $promocion[0]->dias;
        $precio_dia = round($importe / $dias, 2);
        $payer      = new Payer();
        $payer->setPaymentMethod('paypal');
        $items    = array();
        $subtotal = 0;
        //$cart = \Session::get('cart');
        $currency = 'EUR';
        //foreach($cart as $producto){
        $item = new Item();
        $item->setName('DIAS ANUNCIO')
            ->setCurrency($currency)
            ->setDescription('DIAS DE ANUNCIO')
            ->setQuantity($dias)
            ->setPrice($precio_dia);
        $items[]  = $item;
        $subtotal = ($dias * $precio_dia);
        //}
        $item_list = new ItemList();
        $item_list->setItems($items);
        $details = new Details();
        $details->setSubtotal($subtotal);
        $total  = $subtotal;
        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pedido de prueba en mi Laravel CONTACTOS');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
            ->setCancelUrl(\URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Ups! Algo salió mal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());
        \Session::put('dias_a_contratar', $dias);
        \Session::put('idpromocion', $id);
        \Session::put('importe_total', $dias * $precio_dia);
        if (isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

    }

    public function getPaymentStatus()
    {
        $newpago = new Pago();
        // Get the payment ID before session clear
        $payment_id    = \Session::get('paypal_payment_id');
        $dias          = \Session::get('dias_a_contratar');
        $importe_total = \Session::get('importe_total');
        $idpromocion   = \Session::get('idpromocion');
        // clear the session payment ID
        \Session::forget('paypal_payment_id');
        \Session::forget('dias_a_contratar');
        \Session::forget('importe_total');
        \Session::forget('idpromocion');

        $payerId = Input::get('PayerID');
        $token   = Input::get('token');
        //if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
        if (empty($payerId) || empty($token)) {
            return \Redirect::to('/')
                ->with('message', 'Hubo un problema al intentar pagar con Paypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);
        //echo '
        if ($result->getState() == 'approved') {
            // payment made
            $newpaquete               = new Paquete();
            $newpaquete->tipo         = "PAGO";
            $newpaquete->idanunciante = \Auth::user()->id;
            $newpaquete->total        = $dias;
            $newpaquete->dcontratados = $dias;
            $newpaquete->drestantes   = $dias;
            $newpaquete->fechaReg     = date("Ymd");
            $newpaquete->fechaUlt     = date("Ymd");

            $newpago->paymentID  = $payment_id;
            $newpago->payerID    = $payerId;
            $newpago->iduser     = \Auth::user()->id;
            $newpago->fecha_pago = date("Ymd");
            $newpago->dias       = $dias;

            $newpago->precio = $importe_total / $dias;
            $newpago->total  = round($newpago->precio * $newpago->dias, 2);
            $newpago->save();
            $newpaquete = $this->RepartirParteAnuncio($newpaquete, $importe_total / $dias);
            $newpaquete->save();
            $promocion                = Promocion::findorfail($idpromocion);
            $promocion[0]->numcompras = $promocion[0]->numcompras + 1;
            $promocion[0]->update();
            $usuarioAnuncio                   = Useranunciante::findorfail(\Auth::user()->id);
            $usuarioAnuncio->dias_disponibles = $usuarioAnuncio->dias_disponibles + $dias;
            $usuarioAnuncio->save();
            $fechaact      = getdate();
            $fechaactual   = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);
            $Totalpagoshoy = DB::table('pagos')
                ->where('pagos.fecha_pago', '=', $fechaactual)
                ->sum('pagos.total');
            $nameusuario = \Auth::user()->name;
            $text        = "
<b>
    NUEVO INGRESO de $nameusuario de $importe_total €
</b>
\n
<b>
    Hoy $fechaactual ingresado $Totalpagoshoy
</b>
";
            $this->telegram->sendMessage([
                'chat_id'    => env('TELEGRAM_CHANNEL_ID', '-1001307907673'),
                'parse_mode' => 'HTML',
                'text'       => $text,
            ]);
            return \Redirect::to('/anunciante/ContratarDias')
                ->with('message', 'Compra realizada de forma correcta');
        }
        return \Redirect::to('/anunciante/ContratarDias')
            ->with('message', 'La compra fue cancelada');
    }

    private function RepartirParteAnuncio(Paquete $paquete, $precioDia)
    {
        $paquete->parte_partner  = $precioDia / 3;
        $paquete->parte_adminpro = $precioDia / 3;
        $paquete->parte_admin    = $precioDia / 3;

        return $paquete;
    }

}
