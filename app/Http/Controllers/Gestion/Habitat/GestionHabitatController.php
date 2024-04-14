<?php

namespace App\Http\Controllers\Gestion\Habitat;

use App\Models\Image;
use App\Models\Habitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GestionHabitatController extends Controller
{
    /**
     * Affiche la liste des habitats.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        //
        $user = auth()->user();

        $habitats = Habitat::all();


        return view('gestion.habitats.index', compact('user', 'habitats'));
    }
    /**
     * Affiche le formulaire de création d'un habitat.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        //
        $user = auth()->user();

        return view('gestion.habitats.create', compact('user'));
    }
    /**
     * Stocke un nouvel habitat dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'commentaire' => ['nullable', 'string', 'max:255'],
            'image_data' => ['image', 'nullable'],
        ]);

        $habitat = Habitat::create($data);

        if ($request->hasFile('image_data')) {
            $imagePath = $request->file('image_data')->store('img', 'public');
            $image = Image::create(['image_data' => $imagePath]);

            $habitat->images()->attach($image->id);
        }

        return redirect()->route('gestion.habitats')->with('success', 'L\'habitat à bien été ajouté');
    }
    /**
     * Affiche le formulaire d'édition d'un habitat.
     *
     * @param \App\Models\Habitat $habitat
     * @return \Illuminate\View\View
     */
    public function edit(Habitat $habitat): View
    {
        $user = auth()->user();
        return view('gestion.habitats.edit', compact('habitat', 'user'));
    }
    /**
     * Met à jour les informations d'un habitat.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habitat $habitat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Habitat $habitat): RedirectResponse
    {
        if (auth()->user()->role->id === 'administrateur') {
            $data = $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'commentaire' => ['nullable', 'string', 'max:255']
            ]);
        } else {
            $data = $request->validate([
                'commentaire' => ['nullable', 'string', 'max:255']
            ]);
        }
        $habitat->update($data);

        return redirect()->route('gestion.habitats')->with('success', 'L\'habitat à bien été modifié');
    }
    /**
     * Supprime un habitat de la base de données.
     *
     * @param \App\Models\Habitat $habitat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Habitat $habitat): RedirectResponse
    {
        $habitat->delete();

        return redirect()->back()->with('success', 'Habitat supprimé');
    }
}
