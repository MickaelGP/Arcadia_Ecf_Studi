<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\RapportVeterinaire;

class ConsultationRapportController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $rapports = RapportVeterinaire::all();
        
        return view('gestion.rapport.index', compact('user','rapports'));
    }
    public function search(Request $request)
    { 
        $rapportVeterinaire = RapportVeterinaire::query();
        // Récupère les paramètres de recherche
        $queryDate = $request->input('date');
        $animal_id = $request->input('animal_id');
        
       
        
        // Construit la requête de recherche
        $rapportsQuery = $rapportVeterinaire;
    
        if ($queryDate || $animal_id) {
            $rapportsQuery->where('date', $queryDate)
                            ->orWhere('animal_id', $animal_id);
            $rapports = $rapportsQuery->get();
        }
       
        
       return view('gestion.rapport.search', ['rapports' => $rapports]);
    }
    public function show($id)
    {
        $user = auth()->user();
        
        $rapport = RapportVeterinaire::findOrFail($id);
        
        return view('gestion.rapport.show',compact('rapport','user'));
    }
    public function create()
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.rapport.create',compact('user','animals'));
    }
    public function store(Request $request)
    {
        
        $userId = auth()->user()->id;
       
        $data = $request->validate([
            'date'=>['required','date'],
            'detail'=>['string','max:255','nullable'],
            'nourriture'=>['required','string','max:255'],
            'etat'=>['string','max:255','required'],
            'quantite'=>['required','int'],
            'animal_id'=>['required','int'],
        ]);
        auth()->user()->rapports()->create($data);
        
        

        return redirect()->route('gestion.rapports')->with('success','Le rapport a bien été ajouté');
    }
    
}
