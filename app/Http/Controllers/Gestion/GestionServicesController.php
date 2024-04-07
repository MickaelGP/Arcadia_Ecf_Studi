<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class GestionServicesController extends Controller
{
    public function index()
    {
        //
        $user = auth()->user();
        $services = Service::all();


        return view('gestion.servicesZoo.index', compact('user','services'));
    }
    public function create()
    {
        //
        $user = auth()->user();

        return view('gestion.servicesZoo.create',compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'=>['required','string','max:255'],
            'description'=>['required','string','max:255']
        ]);
        Service::create($data);

        return redirect()->route('gestion.services')->with('success','Le service à bien été ajouté');
    }
  
    public function edit(Service $service)
    {
        $user = auth()->user();
        return view('gestion.servicesZoo.edit',compact('service','user'));
    }
    
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'nom'=>['required','string','max:255'],
            'description'=>['required','string','max:255']
        ]);

        $service->update($data);

        return redirect()->route('gestion.services')->with('success','Le service à bien été modifié');
    }
    
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with('success', 'Service supprimé');
    }
}
