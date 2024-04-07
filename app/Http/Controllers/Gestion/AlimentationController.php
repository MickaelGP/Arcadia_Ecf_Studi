<?php

namespace App\Http\Controllers\Gestion;

use App\Models\Animal;
use App\Models\Alimentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlimentationController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.alimentations.index', compact('user','animals'));
    }
    public function store(Request $request)
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
