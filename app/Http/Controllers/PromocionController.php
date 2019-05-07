<?php

namespace App\Http\Controllers;

use App\Http\Traits\trait1;
use App\Promocion;
use Auth;
use DB;
use Illuminate\Http\Request;

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Promocion $promocion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //
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
