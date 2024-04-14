<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Envoyer un email en utilisant les données du formulaire
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'description' => ['required', 'string', 'max:255'],
        ]);



        Mail::send(new ContactFormMail($data));

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès!');
    }
}
