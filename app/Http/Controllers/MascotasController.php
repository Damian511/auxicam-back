<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\Dispositivos;
use App\Models\User;
use App\Models\SimCards;
use App\Models\UsuariosDispositivos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MascotasController extends Controller
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
        DB::beginTransaction();
        try {
            //creamos el registro de mascota
            $mascotas = new Mascotas;
            $mascotas->nombre = $request->nombre;
            $mascotas->raza = $request->raza;
            $mascotas->edad = $request->edad;
            $mascotas->estadoid = 1;
            $respuesta = $mascotas->save();
            if($respuesta){
                //creamos el dispositivo
                $dispositivos = new Dispositivos;
                $dispositivos->simcardid = $request->simcardid;
                $dispositivos->mascotaid = $mascotas->mascotaid;
                $dispositivos->estadoid = 1;
                $dispositivos->descripcion = $request->descripcion;
                //guardamos el dispositivo
                $dispositivos->save();
                //obtenemos la simcard
                $simcard = SimCards::find($dispositivos->simcardid);
                $simcard->estadoid = 2;
                //actualizamos el estado de simcard
                $simcard->save();
                //obtenemos el userid
                $usuario = User::where('id','=',$request->usuarioid)->first();
                //creamos el usuarioDispositivo
                $usuarioDispositivos = new UsuariosDispositivos;
                $usuarioDispositivos->dispositivoid = $dispositivos->dispositivoid;
                $usuarioDispositivos->usuarioid = $usuario->id;
                $usuarioDispositivos->save();
            }
            DB::commit();
            return "Se inserto el registro correctamente";
        } catch (\Exception $e) {
            DB::rollback();
            return "No se pudo realizar la operacion" .$e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascotas $mascotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascotas $mascotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascotas $mascotas)
    {
        //
    }
}
