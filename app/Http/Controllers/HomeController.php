<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Habitat;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Affiche la vue Principale.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $avis = Avi::where('isValide',1)->get();

        return view('index',compact('avis'));
    }
    /**
     * Récupère tous les services et les affiche dans la vue service.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showServices()
    {
        $services = Service::all();
        return view('service', compact('services'));
    }
     /**
     * Affiche la vue Habitat.
     *
     * @return \Illuminate\View\View
     */
    public function showHabitats()
    {
        $habitats = Habitat::all();

        return view('habitat',compact('habitats'));
    }
     /**
     * Affiche la vue Contact.
     *
     * @return \Illuminate\View\View
     */
    public function showContact()
    {
        return view('contact');
    }
    /**
     * Stocke un nouvel avis dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'commentaire' => ['required', 'string', 'max:255'],
        ]);
        Avi::create($data);

        return redirect()->back()->with('success', 'Votre avis à bien été envoyé');
    }
}
