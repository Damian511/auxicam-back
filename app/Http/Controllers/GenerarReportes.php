<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerarReportes extends Controller
{
    public function imprimir()
    {
        $pdf = \PDF::loadView('ejemplo');
        return $pdf->download('ejemplo.pdf');
    }
}
