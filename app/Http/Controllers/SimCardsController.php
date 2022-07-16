<?php

namespace App\Http\Controllers;

use App\Models\SimCards;
use Illuminate\Http\Request;

class SimCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = SimCards::where('estadoid','>=',0)->with('estado')->get();
        return $respuesta;
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
        //creamos el nuevo registro
        $sim = new SimCards;
        //seteamos los datos del back
        $sim->numero = $request->numero;
        $sim->estadoid = 1;
        //guardamos el registro
        $sim->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimCards  $simCards
     * @return \Illuminate\Http\Response
     */
    public function show(SimCards $simCards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimCards  $simCards
     * @return \Illuminate\Http\Response
     */
    public function edit(SimCards $simCards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimCards  $simCards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimCards $simCards)
    {
        //seteamos los datos del request
        $simCards->numero = $request->numero;
        $simCards->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimCards  $simCards
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimCards $simCards)
    {
        //
    }

    public function desactivar(SimCards $simCards)
    {
        $simCards->estadoid = 0;
        $simCards->save();
    }

    public function comprobarSIM(Request $request)
    {
        $respuesta = SimCards::where('numero','=',$request->numero)->where('estadoid','=',1)->first();
        if(is_null($respuesta)){
            return array(
                "value" => true,
                "mensaje" => "El número ingresado no se encuentra en la base de datos o no se puede vincular"
            );
        }else{
            return array(
                "value" => false,
                "sim" =>$respuesta->simcardid
            );
        }
    }
}
