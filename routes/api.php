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

Route::post('/registerUser', 'RegisterController@registerUser');

Route::post('/login' , 'LoginController@login');

Route::post('/logout' , 'LoginController@logout');

//rutas para los metodos del usuario

Route::middleware('auth:sanctum')->get('/usuarios', 'UserController@index');

Route::middleware('auth:sanctum')->put('/usuarios/{user}', 'UserController@update');

Route::middleware('auth:sanctum')->put('/usuarios/desactivar/{user}', 'UserController@desactivar');

//rutas para los metodos del sim

Route::middleware('auth:sanctum')->get('/simcard', 'SimCardsController@index');

Route::middleware('auth:sanctum')->post('/simcard', 'SimCardsController@store');

Route::middleware('auth:sanctum')->put('/simcard/{simCards}', 'SimCardsController@update');

Route::middleware('auth:sanctum')->put('/simcard/desactivar/{simCards}', 'SimCardsController@desactivar');

Route::middleware('auth:sanctum')->put('comprobarSIM','SimCardsController@comprobarSIM');

//vincular dispositivo al usuario
Route::middleware('auth:sanctum')->post('altaDispositivo','MascotasController@store');

//listar dispositivos por usuario
Route::middleware('auth:sanctum')->get('dispositivosUsuarios','DispositivosController@index');





Route::middleware('auth:sanctum')->put('actualizarPass/{usuarios}','UsuariosController@actualizarPass');

Route::middleware('auth:sanctum')->get('verUsuario','UsuariosController@show');

#Route::middleware('auth:sanctum')->get('localizaciones','LocalizacionesController@index');

Route::get('localizaciones','LocalizacionesController@index');

Route::middleware('auth:sanctum')->get('verEstado','LocalizacionesController@verEstado');



//Route::middleware('auth:sanctum')->post('localizaciones','SimCardsController@store');

Route::post('localizaciones','LocalizacionesController@store');



Route::middleware('auth:sanctum')->get('marcadores','LocalizacionesController@marcadores');

//Route::middleware('auth:sanctum')->get('send-mail','MailSend@mailsend');

Route::get('send-mail','MailSend@mailsend');

Route::put('prueba/{user}','UserController@probarPass');