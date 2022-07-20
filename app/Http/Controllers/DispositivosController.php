<?php

namespace App\Http\Controllers;

use App\Events\DispositivoStatus;
use App\Models\Dispositivos;
use App\Models\User;
use App\Models\SimCards;
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
    public function destroy(Request $request,Dispositivos $dispositivos)
    {
        //obtenemos la simcard
        $simcard = SimCards::find($dispositivos->simcardid);
        //obtenemos la mascota
        $mascota = Mascotas::find($dispositivos->mascotaid);
        //obtenemos el el registro usuario-dispositivo
        $usuarioDispositivo = UsuariosDispositivos::where('usuarioid','=',$request->usuarioid)->where('dispositivoid','=',$dispositivos->dispositivoid)->first();
        //eliminamos el registro usuario por dispositivo
        $usuarioDispositivo->delete();
        //eliminamos el dispositivo
        $dispositivos->delete();
        //eliminamos la mascota
        $mascota->delete();
        //cambiamos el estado de la sim
        $simcard->estadoid = 1;
        $simcard->save();
        return "se realizaco correctamente";
    }

    public function estatus(Request $request)
    {
        event(new DispositivoStatus($request->message));  
    }
}
