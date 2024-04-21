<?php

namespace App\Http\Controllers\Gestion\Alimentation;

use App\Models\Animal;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlimentationRequest;
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

        return view('gestion.alimentations.index', compact('user', 'animals'));
    }
    /**
     * Stocke une nouvelle alimentation dans la base de données.
     *
     * @param \App\Http\Requests\AlimentationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlimentationRequest $request): RedirectResponse
    {

        $data = $request->validated();

        auth()->user()->alimentations()->create($data);

        return redirect()->route('gestion')->with('success', 'L\'alimentation a bien été ajoutée');
    }
}
