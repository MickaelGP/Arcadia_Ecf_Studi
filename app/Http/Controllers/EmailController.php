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
            'pseudo' => 'required',
            'email' => 'required|email',
            'description' => 'required',
        ]);

       

        Mail::send(new ContactFormMail($data));

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès!');
    }
}
