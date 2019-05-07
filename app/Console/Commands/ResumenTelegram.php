<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class ResumenTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Tele:Resumen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resumen enviado por Telegram';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->telegram = new Api('642406866:AAHMJndO_QhFzliHewOLUvPUtFZOMhjZZtI');

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fechaact    = getdate();
        $fechaactual = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);

        $TotalFactu = DB::table('pagos')
            ->where('pagos.fecha_pago', "=", $fechaactual)
            ->sum('pagos.total');
        $totales       = array();
        $Totalpartners = DB::table('anunciosDia')
            ->where('anunciosDia.fecha', '=', $fechaactual)
            ->sum('anunciosDia.partner_comision');
        $Totaladminpros = DB::table('anunciosDia')
            ->where('anunciosDia.fecha', '=', $fechaactual)
            ->sum('anunciosDia.adminpro_comision');
        $Totaladmins = DB::table('anunciosDia')
            ->where('anunciosDia.fecha', '=', $fechaactual)
            ->sum('anunciosDia.admin_comision');
        $fechaactual = date("d/m/Y", strtotime($fechaactual));
        $text        = "<b>$fechaactual</b>\n<b>INGRESADO</b> ==> <b>$TotalFactu €</b>\n";
        $text        = $text . "<b>PARTNERS</b> ==> <b>$Totalpartners €</b>\n";
        $text        = $text . "<b>ADMIN PRO</b> ==> <b>$Totaladminpros €</b>\n";
        $text        = $text . "<b>ADMIN</b> ==> <b>$Totaladmins €</b>\n";
        $this->telegram->sendMessage([
            'chat_id'    => env('TELEGRAM_CHANNEL_ID', '-1001307907673'),
            'parse_mode' => 'HTML',
            'text'       => $text,
        ]);
    }

}
