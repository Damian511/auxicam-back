<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = User::where('rolid','=',2)->with('estado')->with('rol')->get();
        return $respuesta;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //seteamos los datos del request
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->fechanacimiento = $request->fechanacimiento;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function desactivar(User $user)
    {
        $user->estadoid = 0;
        $user->save();
    }

    public function probarPass(Request $request,User $user)
    {
        if (Hash::check($request->old_pass, $user->password)) {
            $user->password = Hash::make($request->new_pass);
            $user->pass_default = false;
            $user->save();
        }else{
            return response()->json(['error' => 'La contrase??a antigua no coincide con la contrase??a ingresada'],422);
        }

    }
}
