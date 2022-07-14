<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GenerarReportes extends Controller
{
    public function usuariosActivos()
    {
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
        $pdf = \PDF::loadView('usuariosActivos',compact('users'));
        return $pdf->stream('ejemplo.pdf');
    }
}
