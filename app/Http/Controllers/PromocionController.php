<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Promocion;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PromocionController extends Controller
{
    use trait1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \Session::put('seccion_actual', "promociones");
        $promociones = DB::table('promociones')->paginate(5);
        return view('admin.Promocion.index', compact('promociones'));


    }
    public function search(Request $request){
        \Session::put ('seccion_actual', "promociones");
        if ($request->ajax()) {
            $promociones = DB::table('promociones')
                ->paginate(5);

            if ($promociones) {
                $salida = view('admin.Promocion.includes.tablaPromociones', compact('promociones'))->render();
                return response()->json($salida);
            }
        }
    }
   public function CrearPromocion()
    {
        \Session::put('seccion_actual', "promociones");


 
        return view("admin.Promocion.NuevaPromocion.NuevaPromocion");
    
    }

    public function NuevaPromocion(Request $request)
    {
        \Session::put('seccion_actual',"promociones");
        $Promocion              = new Promocion;
        $Promocion->descripcion = $request->get('descripcion');
        $Promocion->dias      = $request->get('dias');
        $Promocion->importe = $request->get('importe');
        $Promocion->fecha_inicio     = $request->get('fecha_inicio');        
        $Promocion->fecha_fin  = $request->get('fecha_fin');
        $Promocion->status      = 1;

        $Promocion->save();
        return Redirect::to('/admin/Promocion');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPromocion= Promocion::findOrFail($id);

        return view("admin.Promocion.editPromocion.editPromocion", ["promocion" => $editPromocion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updPromocion=Promocion::findOrFail($id);
        $updPromocion->descripcion=$request->get('descripcion');
        $updPromocion->dias=$request->get('dias');
        $updPromocion->importe=$request->get('importe');
        $updPromocion->fecha_inicio=$request->get('fecha_inicio');
        $updPromocion->fecha_fin=$request->get('fecha_fin');
        $updPromocion->update();
        return Redirect::to('/admin/Promocion');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $req){
        $promocion = Promocion::findOrFail($req->id);
        if ($promocion->status == 0) {
            $promocion->status = 1;
        } else {
            $promocion->status = 0;
        }
        $promocion->update();
        return response()->json($promocion);
    }
}
