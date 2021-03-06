<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\NewLocation;

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

//ruta para websocket de localizaciones
/* Route::get('/location', function (Request $request) {
    broadcast(new NewLocation());
}); */

//ruta para websocket de gps status
/* Route::get('/gpsStatus', function (Request $request) {
    broadcast(new GpsStatus());
});
 */

//rutas para login y register
Route::post('/register', 'RegisterController@register');

Route::post('/registerUser', 'RegisterController@registerUser');

Route::post('/login' , 'LoginController@login');

Route::post('/loginUser' , 'LoginController@loginUser');

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

//Route::middleware('auth:sanctum')->put('comprobarSIM','SimCardsController@comprobarSIM');
Route::put('comprobarSIM','SimCardsController@comprobarSIM');

//vincular dispositivo al usuario
Route::middleware('auth:sanctum')->post('altaDispositivo','MascotasController@store');

//listar dispositivos por usuario
Route::middleware('auth:sanctum')->get('dispositivosUsuarios','DispositivosController@index');

//listar ubicaciones
Route::middleware('auth:sanctum')->get('localizaciones','LocalizacionesController@marcadores');

//ruta para insertar las localizaciones
Route::post('localizaciones','LocalizacionesController@store');

//ruta para visualizar el estatus
Route::put('dispositivoEstatus','DispositivosController@estatus');

//listar historico
Route::middleware('auth:sanctum')->put('historico','LocalizacionesController@historico');

//cambiar password
Route::middleware('auth:sanctum')->put('cambiarPass/{user}','UserController@probarPass');

//ruta para actualizar el password
Route::middleware('auth:sanctum')->put('actualizarPass/{usuarios}','UsuariosController@actualizarPass');

//ruta para descargar los reportes
Route::middleware('auth:sanctum')->get('reporteUsuarios','GenerarReportes@usuariosActivos');

Route::middleware('auth:sanctum')->get('reporteSIM','GenerarReportes@simsActivas');

//ruta para ver estado del dispositivo
Route::middleware('auth:sanctum')->get('verEstado','LocalizacionesController@verEstado');

//ruta para eliminar vinculaciones
Route::middleware('auth:sanctum')->delete('desvincularDispositivo/{dispositivos}','DispositivosController@destroy');



/* Route::middleware('auth:sanctum')->get('verUsuario','UsuariosController@show');

Route::middleware('auth:sanctum')->get('localizaciones','LocalizacionesController@index');

Route::get('localizaciones','LocalizacionesController@index');

Route::middleware('auth:sanctum')->get('verEstado','LocalizacionesController@verEstado');

Route::middleware('auth:sanctum')->post('localizaciones','SimCardsController@store');

Route::middleware('auth:sanctum')->get('marcadores','LocalizacionesController@marcadores');

Route::middleware('auth:sanctum')->get('send-mail','MailSend@mailsend');

Route::get('send-mail','MailSend@mailsend'); */



