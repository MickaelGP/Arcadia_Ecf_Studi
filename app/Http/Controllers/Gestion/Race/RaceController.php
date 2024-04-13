<?php

namespace App\Http\Controllers\Gestion\Race;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('gestion.animals.races.create',compact('user'));
    }
    /**
     * Stocke une nouvelle race dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        
        $data = $request->validate([
            'label' =>['required','string','max:50','unique:races']
        ]);
        
        Race::create($data);

        return redirect()->route('gestion')->with('success','La race à bien été ajoutée');
    }
}
