<?php

namespace App\Http\Controllers\Gestion\Rapport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportRequest;
use App\Models\Animal;
use App\Models\RapportVeterinaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConsultationRapportController extends Controller
{
    /**
     * Affiche la liste des rapports.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();
        $rapports = RapportVeterinaire::all();

        return view('gestion.rapport.index', compact('user', 'rapports'));
    }
    /**
     * Recherche des rapports en fonction des critères spécifiés.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): View
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
    /**
     * Affiche les détails d'un rapport.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $user = auth()->user();

        $rapport = RapportVeterinaire::findOrFail($id);

        return view('gestion.rapport.show', compact('rapport', 'user'));
    }
    /**
     * Affiche le formulaire de création d'un rapport.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $user = auth()->user();

        $animals = Animal::all();

        return view('gestion.rapport.create', compact('user', 'animals'));
    }
    /**
     * Stocke un nouveau rapport vétérinaire dans la base de données.
     *
     * @param \App\Http\Requests\RapportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RapportRequest $request): RedirectResponse
    {

        $user = auth()->user();

        $data = $request->validated();

        $user->rapports()->create($data);

        return redirect()->route('gestion.rapports')->with('success', 'Le rapport a bien été ajouté');
    }
}
