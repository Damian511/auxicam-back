<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GenerarReportes extends Controller
{
    public function usuariosActivos()
    {
        //generamos la consulta sql
        $users = DB::table('users')
        ->where('users.rolid','=',2)
        ->join('estados','users.estadoid','=','estados.estadoid')
        ->leftJoin('usuariosdispositivos', 'users.id', '=', 'usuariosdispositivos.usuarioid')
        ->select('users.id','users.name'
        ,'users.telefono','users.email'
        //,'users.created_at',
        ,'estados.descripcion as estado')
        ->selectRaw('COUNT(usuariosdispositivos.dispositivoid) as cantidad')
        ->selectRaw('DATE(users.created_at) as fecha')
        ->groupBy('users.id','estados.estadoid')
        ->get();
        //obtenemos la fecha
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //generamos el pdf
        $pdf = \PDF::loadView('usuariosActivos',compact('users'),compact('date'));
        return $pdf->stream('usuarios.pdf');
    }
    public function simsActivas(){
        //generamos la consulta
        $simcards = DB::table('simcards')
        ->where('simcards.estadoid','=',1)
        ->join('estados','simcards.estadoid','=','estados.estadoid')
        ->select('simcards.simcardid','simcards.numero','estados.descripcion as estado')
        ->get();
        //obtenemos la fecha
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //generamos el pdf
        $pdf = \PDF::loadView('simActivas',compact('simcards'),compact('date'));
        return $pdf->stream('simcards.pdf');

    }
}
