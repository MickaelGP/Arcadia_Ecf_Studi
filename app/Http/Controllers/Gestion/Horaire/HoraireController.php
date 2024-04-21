<?php

namespace App\Http\Controllers\Gestion\Horaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\HoraireRequest;
use App\Models\Horaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HoraireController extends Controller
{
    /**
     * Affiche la liste des horaires.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();

        $horaires = Horaire::all();

        return view('gestion.horaires.index', compact('user', 'horaires'));
    }
    /**
     * Affiche le formulaire de création d'un horaire.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $user = auth()->user();

        return view('gestion.horaires.create', compact('user'));
    }
    /**
     * Stocke un nouvel horaire dans la base de données.
     *
     * @param \App\Http\Requests\HoraireRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HoraireRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Horaire::create($data);

        return redirect()->route('gestion.horaires')->with('success', 'L\'horaire à bien été ajouté');
    }
    /**
     * Affiche le formulaire d'édition d'un horaire.
     *
     * @param \App\Models\Horaire $horaire
     * @return \Illuminate\View\View
     */
    public function edit(Horaire $horaire): View
    {
        $user = auth()->user();

        return view('gestion.horaires.edit', compact('user', 'horaire'));
    }
    /**
     * Met à jour les informations d'un horaire.
     *
     * @param \App\Http\Requests\HoraireRequest $request
     * @param \App\Models\Horaire $horaire
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HoraireRequest $request, Horaire $horaire): RedirectResponse
    {
        $data = $request->validated();

        $horaire->update($data);

        return redirect()->route('gestion.horaires')->with('success', 'L\'horaire à bien été modifié');
    }
     /**
     * Supprime un habitat de la base de données.
     *
     * @param \App\Models\Horaire $habitat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Horaire $horaire): RedirectResponse
    {
        $horaire->delete();

        return redirect()->back()->with('success', 'Horaire supprimé');
    }
}
