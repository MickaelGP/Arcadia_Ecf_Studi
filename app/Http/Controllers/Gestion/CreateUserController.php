<?php

namespace App\Http\Controllers\Gestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();

        $roles = Role::whereIn('id',[2,3])
                      ->get();
        return view('gestion.comptes.index', [
            'user' => $user,
            'roles' => $roles
        ] );
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => ['required','email','string','max:255','unique:users'],
            'password' =>['required','confirmed','string','min:8'],
            'nom' => ['required','string','max:50'],
            'prenom' => ['required','string','max:50'],
            'role_id'=>['required','int']
        ]);
        if($data){
            User::create([
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'nom' =>$data['nom'] ,
                'prenom' =>$data['prenom'] ,
                'role_id'=>$data['role_id'],
            ]);
            return redirect()->back()->with('success', 'L\'utilisateur à été créer' );
        }

    }
}
