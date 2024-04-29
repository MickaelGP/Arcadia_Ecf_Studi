<?php

namespace App\Http\Controllers\Gestion\Avi;

use App\Models\Avi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AviRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AviController extends Controller
{
     /**
     * Stocke un nouvel avis dans la base de données.
     *
     * @param \App\Http\Requests\AviRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AviRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Avi::create($data);

        return redirect()->back()->with('success', 'Votre avis à bien été envoyé');
    }
    /**
     * Affiche le formulaire d'édition d'un avis.
     *
     * @param \App\Models\Avi $avi
     * @return \Illuminate\View\View
     */
    public function edit(Avi $avi): View
    {
        $user = auth()->user();
        return view('gestion.avis.edit', compact('user','avi'));
    }
    /**
     * Met à jour les informations d'un avis.
     *
     * @param \App\Http\Requests\AviRequest $request
     * @param \App\Models\Avi $avi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AviRequest $request, Avi $avi): RedirectResponse
    {

       $data = $request->validated();
       
        $avi->update($data);

        return redirect()->route('gestion')->with('success','L\'avi à bien été modifié');
    }
}
