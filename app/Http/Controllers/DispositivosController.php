<?php

namespace App\Http\Controllers;

use App\Models\Dispositivos;
use App\Models\User;
use App\Models\UsuariosDispositivos;
use App\Models\Mascotas;
use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //seleccionamos todos los dispositivos asociados al usuario
        $usuario = User::where('id','=',$request->usuarioid)->first();
        //obtenemos los dispositivos
        $usuariosDispositivos = UsuariosDispositivos::where('usuarioid','=',$usuario->id)->get();
        //inicializamos la respuesta
        $respuesta = array();
        //recorremos el array de usuarios por dispositivos
        foreach($usuariosDispositivos as $value){
            $dispositivo = Dispositivos::where('dispositivoid','=',$value->dispositivoid)->with('mascota')->with('estado')->first();
            $respuesta[] = $dispositivo;
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function show(Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispositivos $dispositivos)
    {
        //
    }
}
