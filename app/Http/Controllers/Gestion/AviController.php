<?php

namespace App\Http\Controllers\Gestion;

use App\Models\Avi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AviController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'commentaire' => ['required', 'string', 'max:255'],
        ]);
        Avi::create($data);

        return redirect()->back()->with('success', 'Votre avis à bien été envoyé');
    }
    public function edit(Avi $avi)
    {
        $user = auth()->user();
        return view('gestion.avis.edit', compact('user','avi'));
    }
    public function update(Request $request, Avi $avi)
    {

       $data = $request->validate([
        'isValide' => ['required','int']
       ]);
       
        $avi->update($data);

        return redirect()->route('gestion')->with('success','L\'avi à bien été modifié');
    }
}
