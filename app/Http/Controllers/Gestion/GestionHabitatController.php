<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Habitat;

class GestionHabitatController extends Controller
{
     
    public function index()
    {
        //
        $user = auth()->user();

        $habitats = Habitat::all();


        return view('gestion.habitats.index', compact('user','habitats'));
    }
    
    public function create()
    {
        //
        $user = auth()->user();

        return view('gestion.habitats.create',compact('user'));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'=>['required','string','max:255'],
            'description'=>['required','string','max:255']
        ]);
        Habitat::create($data);

        return redirect()->route('gestion.habitats')->with('success','L\'habitat à bien été ajouté');
    }
    
    public function edit(Habitat $habitat)
    {
        $user = auth()->user();
        return view('gestion.habitats.edit',compact('habitat','user'));
    }
 
    public function update(Request $request, Habitat $habitat)
    {
        if(auth()->user()->role->id === 'administrateur'){
            $data = $request->validate([
                'nom'=>['required','string','max:255'],
                'description'=>['required','string','max:255'],
                'commentaire' => ['nullable','string','max:255']
            ]);
        }else{
            $data = $request->validate([
                'commentaire' => ['nullable','string','max:255']
            ]);
        }
       

        $habitat->update($data);

        return redirect()->route('gestion.habitats')->with('success','L\'habitat à bien été modifié');
    }
    
    public function destroy(Habitat $habitat)
    {
        $habitat->delete();

        return redirect()->back()->with('success', 'Habitat supprimé');
    }
}
