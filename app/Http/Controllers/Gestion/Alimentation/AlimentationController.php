<?php

namespace App\Http\Controllers\Gestion\Alimentation;

use App\Models\Animal;
use Illuminate\View\View;
use App\Models\Alimentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AlimentationController extends Controller
{
      /**
     * Affiche la vue index pour la gestion des alimentations.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.alimentations.index', compact('user','animals'));
    }
    /**
     * Stocke une nouvelle alimentation dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        
        $data = $request->validate([
            'date_alimentation' => ['required', 'date'],
            'heure_alimentation' => ['required', 'date_format:H:i'],
            'nourriture' => ['required', 'string', 'max:255'],
            'quantite' => ['required', 'numeric'],
            'animal_id' => ['required', 'integer'],
        ]);
        
        

        auth()->user()->alimentations()->create($data);

        

        return redirect()->route('gestion')->with('success','L\'alimentation a bien été ajoutée');
    }
}
