<?php

namespace App\Http\Controllers\Gestion;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RaceController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        return view('gestion.animals.races.create',compact('user'));
    }
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'label' =>['required','string','max:50','unique:races']
        ]);
        
        Race::create($data);

        return redirect()->route('gestion')->with('success','La race à bien été ajoutée');
    }
}
