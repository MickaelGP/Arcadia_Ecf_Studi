<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alimentation;
use App\Models\Avi;
use App\Models\RapportVeterinaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Affiche la page d'accueil du module de gestion.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();

        $rapports = RapportVeterinaire::all();

        $avis = Avi::where('isValide', null)->get();

        $alimentations = Alimentation::all();

        return view('gestion.index', compact('user', 'rapports', 'avis', 'alimentations'));
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
