<?php

namespace App\Http\Controllers\Gestion\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GestionServicesController extends Controller
{
    /**
     * Affiche la liste des services.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        //
        $user = auth()->user();
        $services = Service::all();


        return view('gestion.servicesZoo.index', compact('user', 'services'));
    }
    /**
     * Affiche le formulaire de création d'un service.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        //
        $user = auth()->user();

        return view('gestion.servicesZoo.create', compact('user'));
    }
    /**
     * Stocke un nouveau service dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);
        Service::create($data);

        return redirect()->route('gestion.services')->with('success', 'Le service à bien été ajouté');
    }
    /**
     * Affiche le formulaire d'édition d'un service.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service): View
    {
        $user = auth()->user();
        return view('gestion.servicesZoo.edit', compact('service', 'user'));
    }
    /**
     * Met à jour les informations d'un service.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $service->update($data);

        return redirect()->route('gestion.services')->with('success', 'Le service à bien été modifié');
    }
    /**
     * Supprime un service de la base de données.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->back()->with('success', 'Service supprimé');
    }
}
