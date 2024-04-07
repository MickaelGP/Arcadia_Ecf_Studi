<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alimentation;
use App\Models\Avi;
use App\Models\RapportVeterinaire;

class GestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();

        $rapports = RapportVeterinaire::all();
        
        $avis = Avi::where('isValide', null)->get();

        $alimentations = Alimentation::all();

        return view('gestion.index', compact('user','rapports','avis','alimentations'));
    }
    public function createComptes()
    {
        return redirect()->route('create.comptes');
    }
}
