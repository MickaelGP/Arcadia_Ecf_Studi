<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Horaire;

class HoraireController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $horaires = Horaire::all();

        return view('gestion.horaires.index', compact('user','horaires'));
    }
    public function create()
    {
        $user = auth()->user();

        return view('gestion.horaires.create', compact('user'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'ouverture_matin' => ['required','string','max:50'],
            'ouverture_soir' => ['nullable','string','max:50'],
            'fermeture_matin' => ['nullable','string','max:50'],
            'fermeture_soir' => ['required','string','max:50']
        ]);

        Horaire::create($data);

        return redirect()->route('gestion.horaires')->with('success','L\'horaire à bien été ajouté');
    }
    public function edit(Horaire $horaire)
    {
        $user = auth()->user();

        return view('gestion.horaires.edit',compact('user','horaire'));
    }
    public function update(Request $request, Horaire $horaire)
    {
        $data = $request->validate([
            'ouverture_matin' => ['required','string','max:50'],
            'ouverture_soir' => ['nullable','string','max:50'],
            'fermeture_matin' => ['nullable','string','max:50'],
            'fermeture_soir' => ['required','string','max:50']
        ]);

        $horaire->update($data);

        return redirect()->route('gestion.horaires')->with('success','L\'horaire à bien été modifié');

    }
}
