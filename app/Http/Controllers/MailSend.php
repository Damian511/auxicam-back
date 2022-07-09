<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailSend extends Controller
{
    public function mailsend(Request $request)
    {
        $password = Str::random(12);
        $details = [
            'title' => 'Confirmación de correo electrónico',
            'body' => 'Presione en el siguiente enlace para activar su cuenta y modificar su contraseña',
            'pass' => 'Su contraseña por defecto es : ' .$password,
        ];

        \Mail::to($request->mail)->send(new SendMail($details));
        return "se realizo correctamente la operación";
    }
}
