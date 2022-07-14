<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>['required'],
            'password' =>['required']
        ]);

        if(Auth::attempt($request->only('email','password'))){
            $user = Auth::user();
            if($user->rolid != 1){
                $respuesta = array('cert'=>'El usuario no tiene acceso administrador');
                return response()->json(array("errors"=>$respuesta),422);
            }else{
                return response()->json(Auth::user(),200);
            }
        }

        throw ValidationException::withMessages([
            'email' => ['Las credenciales ingresadas no son correctas']
        ]);
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>['required'],
            'password' =>['required']
        ]);

        if(Auth::attempt($request->only('email','password'))){
            $user = Auth::user();
            if($user->rolid != 2){
                $respuesta = array('cert'=>'El usuario no tiene acceso');
                return response()->json(array("errors"=>$respuesta),422);
            }else{
                return response()->json(Auth::user(),200);
            }
        }

        throw ValidationException::withMessages([
            'email' => ['Las credenciales ingresadas no son correctas']
        ]);
    }

    public function logout(){
        Auth::logout();
    }

}
