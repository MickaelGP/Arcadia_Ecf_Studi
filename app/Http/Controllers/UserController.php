<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    private $horaires;

    public function __construct(Horaire $horaires)
    {
        $this->horaires = $horaires->all();
    }
    /**
     * Affiche la vue de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function connexion(): View
    {
        return view('connexion', [
            'horaires' => $this->horaires
        ]);
    }
    /**
     * Gère le processus de connexion de l'utilisateur.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('gestion');
        }

        // Si l'authentification échoue, rediriger avec un message d'erreur
        return redirect()->back()->withInput($request->only('username'))->withErrors([
            'username' => 'Email ou mot de passe incorrect.',
        ]);
    }
    /**
     * Déconnecte l'utilisateur.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
