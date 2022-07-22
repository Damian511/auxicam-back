<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Mail\SendMail;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'telefono' => ['required'],
            'direccion' => ['required'],
            'fechanacimiento' => ['required'],
            'password' => ['required','min:6','confirmed']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fechanacimiento' => $request->fechanacimiento,
            'estadoid' => 1,
            'rolid' => 1,
            'password' => Hash::make($request->password),
            'pass_default' => false
        ]);
    }

    public function registerUser(Request $request){
        $password =  Str::random(6);
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'telefono' => ['required'],
            'direccion' => ['required'],
            'fechanacimiento' => ['required'],
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fechanacimiento' => $request->fechanacimiento,
            'estadoid' => 1,
            'rolid' => 2,
            'password' => Hash::make($password),
            'pass_default' => true
        ]);

        $details = [
            'title' => 'Confirmación de correo electrónico',
            'body' => 'Presione en el siguiente enlace para activar su cuenta y modificar su contraseña ',
            'enlance' => 'http://auxicam.webhop.me/auxicam',
            'pass' => 'Su contraseña por defecto es : ' .$password,
        ];

        \Mail::to($request->email)->send(new SendMail($details));
    }
}
