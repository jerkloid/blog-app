<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function show(){

        //verifica que el usuario tenga acceso mediante auth
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.login');


    }
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        //auth maneja metodos para validad
        //auth::validate automaticamente valida que las credenciales sean correctas
        //name y pass igual a las de la base etc

        if(!auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('Login Error');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);
    }
    public function authenticated(Request $request, $user) {
        return redirect('/home');
    }
}
