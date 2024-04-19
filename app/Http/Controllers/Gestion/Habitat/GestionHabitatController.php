<?php

namespace App\Http\Controllers\Gestion\Habitat;

use App\Models\Image;
use App\Models\Habitat;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabitatRequest;
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
     * @param \App\Http\Requests\HabitatRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HabitatRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $habitat = Habitat::create($data);

        $this->processImages($request, $habitat);

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
     * @param \App\Http\Requests\HabitatRequest $request
     * @param \App\Models\Habitat $habitat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HabitatRequest $request, Habitat $habitat): RedirectResponse
    {
        $data = $request->validated();

        $habitat->update($data);

        $this->processImages($request, $habitat);

        return redirect()->route('gestion.habitats')->with('success', 'L\'habitat à bien été modifié');
    }
    /**
     * Traite les images téléchargées pour l'habitat.
     *
     * @param \App\Http\Requests\HabitatRequest $request
     * @param \App\Models\Habitat $habitat
     * @return void
     */
    protected function processImages(HabitatRequest $request, Habitat $habitat): void
    {
        if ($request->hasFile('image_data')) {
            foreach ($request->file('image_data') as $file) {
                $imagePath = $file->store('img', 'public');
                $image = Image::create(['image_data' => $imagePath]);
                $habitat->images()->attach($image->id);
            }
        }
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
