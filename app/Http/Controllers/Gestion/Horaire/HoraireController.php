<?php

namespace App\Http\Controllers\Gestion\Horaire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'ouverture_matin' => ['required', 'date_format:H:i'],
            'ouverture_soir' => ['nullable', 'date_format:H:i'],
            'fermeture_matin' => ['nullable', 'date_format:H:i'],
            'fermeture_soir' => ['required', 'date_format:H:i']
        ]);


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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Horaire $horaire
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Horaire $horaire): RedirectResponse
    {
        $data = $request->validate([
            'ouverture_matin' => ['required', 'string', 'max:50'],
            'ouverture_soir' => ['nullable', 'string', 'max:50'],
            'fermeture_matin' => ['nullable', 'string', 'max:50'],
            'fermeture_soir' => ['required', 'string', 'max:50']
        ]);

        $horaire->update($data);

        return redirect()->route('gestion.horaires')->with('success', 'L\'horaire à bien été modifié');
    }
}
