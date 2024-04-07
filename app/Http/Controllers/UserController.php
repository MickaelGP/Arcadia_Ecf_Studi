<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function connexion()
    {
        return view('connexion');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('gestion');
        }

        // Si l'authentification échoue, rediriger avec un message d'erreur
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }
    public function logout()
    {
        Auth::logout(); 

        Session::flush();
         
        return redirect()->route('home');
    }
}
