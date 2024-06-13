<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('.log.login');
    }

    public function reg_new()
    {
        return view('log.registro');
    }

    //public function hom(){
    //  return view('.home.home');
    //}

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
        $datos = new User();
        //acojemos la variable para asi verificar si no hay un correo similar ya registrado
        $mail = $request->email;

        $datos->name = $request->name;
        $datos->email = $request->email;
        $datos->password = Hash::make($request->password);

        if (DB::table('users')->where('email', $mail)->exists()) {
            return redirect(route('registro_new'))->with('error','rule');
        } else {
            $datos->save();
            Auth::login($datos);
            return redirect(route('log_home'));
        }
    }

    public function validar(Request $request)
    {

        $credenciales = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credenciales, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'));
        } else {
            //si se realiza el registro mal
            return redirect(route('log_home'))->with('err','rule1');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('log_home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
