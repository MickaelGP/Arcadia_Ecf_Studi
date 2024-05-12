<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisRequest;
use App\Models\Avi;
use App\Models\Habitat;
use App\Models\Horaire;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{

    private $horaires;
    public function __construct()
    {
        $this->horaires = Horaire::all();
    }
    /**
     * Affiche la vue Principale.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $avis = Avi::where('isValide', 1)->get();

        return view('index', [
            'avis' => $avis,
            'horaires' => $this->horaires
        ]);
    }
    /**
     * Récupère tous les services et les affiche dans la vue service.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showServices(): View
    {
        $services = Service::all();
        return view('service', [
            'services' => $services,
            'horaires' => $this->horaires
        ]);
    }
    /**
     * Affiche la vue Habitat.
     *
     * @return \Illuminate\View\View
     */
    public function showHabitats(): View
    {
        $habitats = Habitat::all();

        return view('habitat', [
            'habitats' => $habitats,
            'horaires' => $this->horaires
        ]);
    }
    /**
     * Affiche la vue Contact.
     *
     * @return \Illuminate\View\View
     */
    public function showContact(): View
    {
        return view('contact', [
            'horaires' => $this->horaires
        ]);
    }
    public function mentionsLegales()
    {
        return view('mentions', [
            'horaires' => $this->horaires
        ]);
    }
}
