<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
       $data = $request->validate([
            'titre' =>['required','string','max:255'],
            'pseudo' => ['required','string','max:255'],
            'email' => ['required','email'],
            'description' => ['required','string','max:255'],
        ]);

       

        Mail::send(new ContactFormMail($data));

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès!');
    }
}
