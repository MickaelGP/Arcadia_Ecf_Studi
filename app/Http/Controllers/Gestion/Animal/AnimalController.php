<?php

namespace App\Http\Controllers\Gestion\Animal;

use App\Models\Vue;
use App\Models\Race;
use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Horaire;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AnimalController extends Controller
{
    private $horaires;
    public function __construct()
    {
        $this->horaires = Horaire::all();
    }
    /**
     * Affiche la liste des animaux.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.animals.index', compact('user', 'animals'));
    }
    public function show(Animal $animal): View
    {
        try {
            $document = Vue::where('nom', $animal->prenom)->first();
            if ($document) {
                Vue::where('nom', $animal->prenom)->update([
                    'nombreDeVue' => $document->nombreDeVue + 1,
                ]);
            } else {
                // Si le document n'existe pas, création d'un nouveau avec la valeur initiale
                Vue::create([
                    'nom' => $animal->prenom,
                    'nombreDeVue' => 1,
                ]);
            }
        } catch (\Exception $e) {

            Log::error('Une erreur est survenue lors de l\'ajout des tendances des animaux: ' . $e->getMessage());
        }

        return view('show', [
            'animal' => $animal,
            'horaires' => $this->horaires,
        ]);
    }
    /**
     * Affiche le formulaire de création d'un animal.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $user = auth()->user();

        $races = Race::all();

        $habitats = Habitat::all();

        return view('gestion.animals.create', compact('user', 'races', 'habitats'));
    }
    /**
     * Affiche le formulaire d'édition d'un animal.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function edit(Animal $animal): View
    {
        $user = auth()->user();

        $races = Race::all();

        $habitats = Habitat::all();

        return view('gestion.animals.edit', compact('animal', 'user', 'races', 'habitats'));
    }
    /**
     * Met à jour les informations d'un animal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Animal $animal): RedirectResponse
    {

        $data = $request->validate([
            'prenom' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'race_id' => ['required', 'int'],
            'habitat_id' => ['required', 'int']
        ]);

        $animal->update($data);

        return redirect()->route('gestion.animals')->with('success', 'L\'animal à bien été modifié');
    }
    /**
     * Stocke un nouvel animal dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $data = $request->validate([
            'prenom' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'race_id' => ['required', 'int'],
            'habitat_id' => ['required', 'int']
        ]);

        Animal::create($data);

        return redirect()->route('gestion.animals');
    }
    /**
     * Supprime un animal de la base de données.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Animal $animal): RedirectResponse
    {
        $animal->delete();

        return redirect()->back()->with('success', 'Service supprimé');
    }
}
