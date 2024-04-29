<?php

namespace App\Http\Controllers\Gestion\Race;

use App\Models\Race;
use App\Http\Controllers\Controller;
use App\Http\Requests\RaceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RaceController extends Controller
{
    /**
     * Affiche le formulaire de création d'une race.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $user = auth()->user();

        return view('gestion.animals.races.create', compact('user'));
    }
    /**
     * Stocke une nouvelle race dans la base de données.
     *
     * @param \App\Http\Requests\RaceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RaceRequest $request): RedirectResponse
    {

        $data = $request->validated();

        Race::create($data);

        return redirect()->route('gestion')->with('success', 'La race à bien été ajoutée');
    }
}
