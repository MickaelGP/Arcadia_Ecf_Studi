<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Race;

class AnimalController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.animals.index', compact('user','animals'));
    }
    public function create()
    {
        $user= auth()->user();

        $races = Race::all();

        $habitats = Habitat::all();

        return view('gestion.animals.create', compact('user','races','habitats'));
    }
    public function edit(Animal $animal)
    {
        $user = auth()->user();

        $races = Race::all();

        $habitats = Habitat::all();

        return view('gestion.animals.edit',compact('animal','user','races','habitats'));
    }
    public function update(Request $request, Animal $animal)
    {
        
        $data = $request->validate([
            'prenom' => ['required','string','max:50'],
            'etat' => ['required','string','max:255'],
            'race_id' => ['required','int'],
            'habitat_id' => ['required','int']
        ]);

        $animal->update($data);

        return redirect()->route('gestion.animals')->with('success','L\'animal à bien été modifié');
    }
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'prenom' => ['required','string','max:50'],
            'etat' => ['required','string','max:255'],
            'race_id' => ['required','int'],
            'habitat_id' => ['required','int']
        ]);

        Animal::create($data);

        return redirect()->route('gestion.animals');
    }
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->back()->with('success', 'Service supprimé');
    }
}
