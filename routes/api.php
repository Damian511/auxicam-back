<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'RegisterController@register');

Route::post('/login' , 'LoginController@login');

Route::post('/logout' , 'LoginController@logout');

Route::middleware('auth:sanctum')->get('/prueba' , 'LoginController@prueba');

Route::middleware('auth:sanctum')->put('actualizarPass/{usuarios}','UsuariosController@actualizarPass');

Route::middleware('auth:sanctum')->get('dispositivosUsuarios','DispositivosController@index');

Route::middleware('auth:sanctum')->get('verUsuario','UsuariosController@show');

Route::middleware('auth:sanctum')->get('localizaciones','LocalizacionesController@index');

Route::middleware('auth:sanctum')->get('verEstado','LocalizacionesController@verEstado');

Route::middleware('auth:sanctum')->get('comprobarSIM','SimCardsController@comprobarSIM');

Route::middleware('auth:sanctum')->post('localizaciones','SimCardsController@store');

Route::middleware('auth:sanctum')->post('altaDispositivo','MascotasController@store');

Route::middleware('auth:sanctum')->get('marcadores','LocalizacionesController@marcadores');

Route::middleware('auth:sanctum')->get('send-mail','MailSend@mailsend');