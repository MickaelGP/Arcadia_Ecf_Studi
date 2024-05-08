<?php

namespace App\Http\Controllers\Gestion;

use App\Models\Avi;
use App\Models\Vue;
use Illuminate\View\View;
use App\Models\Alimentation;
use Illuminate\Http\Request;
use App\Models\RapportVeterinaire;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class GestionController extends Controller
{

    /**
     * Affiche la page d'accueil du module de gestion.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $rapports = RapportVeterinaire::all();

        $avis = Avi::where('isValide', null)->get();

        $alimentations = Alimentation::all();

        try {
            $animalTrends = Vue::orderBy('nombreDeVue', 'DESC')->get();
        } catch (\Exception $e) {
            $animalTrends = [];
            Log::error('Une erreur est survenue lors de la récupération des tendances des animaux: ' . $e->getMessage());
        }

        return view('gestion.index', compact('user', 'rapports', 'avis', 'alimentations', 'animalTrends'));
    }
    /**
     * Redirige vers la page de création de comptes.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createComptes(): RedirectResponse
    {
        return redirect()->route('create.comptes');
    }
}
