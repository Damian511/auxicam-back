<?php

namespace App\Http\Controllers;

use App\Events\NewLocation;
use App\Models\Localizaciones;
use App\Models\Usuarios;
use App\Models\UsuariosDispositivos;
use Illuminate\Http\Request;

class LocalizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $respuestas=Localizaciones::all();
        return $respuestas;
        /* if(empty($request->fechaInicio)){
            $respuesta = Localizaciones::where('dispositivoid','=',$request->dispositivoid)->orderBy('localizacionid','DESC')->get();
            return $respuesta;
        }else{
            $respuesta = Localizaciones::where('dispositivoid','=',$request->dispositivoid)->whereBetween('fechahora', [$request->fechaInicio, $request->fechaFin])->orderBy('localizacionid','DESC')->get();
            return $respuesta;
        } */
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
        if($request->latitud != null && $request->latitud != "0.000000" ){
            //creamos el registro de la nueva localización
/*             $localizaciones = new Localizaciones;
            $localizaciones->dispositivoid = $request->dispositivoid;
            $localizaciones->latitud = $request->latitud;
            $localizaciones->longitud = $request->longitud;
            $localizaciones->fecha = $request->fecha;
            $localizaciones->hora = $request->hora;
            $localizaciones->bateria = $request->Bateria;
            $localizaciones->estadoid = 1;
            $localizaciones->save(); */
            //generamos el evento
            $respuesta = array();
            $latitud = (double) $request->latitud;
            $longitud = (double) $request->longitud;
            $posicion = array($latitud,$longitud);
            array_push($respuesta,$posicion);
            event(new NewLocation($respuesta));
            // retornamos un mensaje
            return "Se inserto el registro correctamente";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localizaciones  $localizaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Localizaciones $localizaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Localizaciones  $localizaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Localizaciones $localizaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Localizaciones  $localizaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizaciones $localizaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localizaciones  $localizaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localizaciones $localizaciones)
    {
        //
    }

    public function verEstado(Request $request)
    {
        $respuesta = Localizaciones::where('dispositivoid','=',$request->dispositivoid)->orderBy('fechahora', 'desc')->first();
        return $respuesta;
    }

    public function marcadores(Request $request){
        $localizaciones = Localizaciones::where('dispositivoid','=',$request->dispositivoid)->get();
/*         $respuesta = array();
        foreach ($localizaciones as $localizacion){
            $latitud = (double) $localizacion->latitud;
            $longitud = (double) $localizacion->longitud;
             $respuesta[]['position'] = $object = (object) array(
                 "lat"=>$latitud,
                 "lng"=>$longitud,
             );
             $object = json_decode(json_encode($respuesta), FALSE);
        }
        return $respuesta;
 */
        $respuesta = array();
        foreach($localizaciones as $localizacion){
            $latitud = (double) $localizacion->latitud;
            $longitud = (double) $localizacion->longitud;
            //$posicion[] = $latitud .$longitud;
            $posicion = array($latitud,$longitud);
            array_push($respuesta,$posicion);
        }
        return $respuesta;
    }

    public function historico(Request $request){
        $localizaciones = Localizaciones::where('dispositivoid','=',$request->dispositivoid)->where('fecha','=',$request->fecha)->whereBetween('hora',[$request->horaInicio,$request->horaFin])->get();
        $respuesta = array();
        foreach($localizaciones as $localizacion){
            $latitud = (double) $localizacion->latitud;
            $longitud = (double) $localizacion->longitud;
            //$posicion[] = $latitud .$longitud;
            $posicion = array($latitud,$longitud);
            array_push($respuesta,$posicion);
        }
        return $respuesta;
    }
}
