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
        //
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
        //
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

    public function comprobarSIM(Request $request)
    {
        $respuesta = SimCards::where('numero','=',$request->sim)->first();
        if(is_null($respuesta)){
            return array(
                "value" => true,
                "mensaje" => "El número ingresado no se encuentra en la base de datos"
            );
        }else{
            return array(
                "value" => false,
                "sim" =>$respuesta->simcardid
            );
        }
    }
}
