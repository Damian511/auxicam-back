<?php

namespace App\Http\Controllers;

use App\Models\UsuariosDispositivos;
use Illuminate\Http\Request;

class UsuariosDispositivosController extends Controller
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
     * @param  \App\Models\UsuariosDispositivos  $usuariosDispositivos
     * @return \Illuminate\Http\Response
     */
    public function show(UsuariosDispositivos $usuariosDispositivos)
    {
        $respuesta = Usuarios::where('nombreusuario','=',$request->usuario)->firts();
        return $respuesta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsuariosDispositivos  $usuariosDispositivos
     * @return \Illuminate\Http\Response
     */
    public function edit(UsuariosDispositivos $usuariosDispositivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsuariosDispositivos  $usuariosDispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsuariosDispositivos $usuariosDispositivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuariosDispositivos  $usuariosDispositivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsuariosDispositivos $usuariosDispositivos)
    {
        //
    }
}
