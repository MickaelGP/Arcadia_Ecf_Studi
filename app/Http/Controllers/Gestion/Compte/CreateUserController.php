<?php

namespace App\Http\Controllers\Gestion\Compte;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Mail\CreationUtilisateurMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CreateUserController extends Controller
{
    /**
     * Affiche la vue index pour la gestion des comptes.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = auth()->user();

        $roles = Role::whereIn('id', [2, 3])
            ->get();
        return view('gestion.comptes.index', [
            'user' => $user,
            'roles' => $roles
        ]);
    }
    /**
     * Stocke un nouvel utilisateur dans la base de données.
     *
     * @param  \App\Http\Requests\CreateUserRequest; $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($data) {
            $user =  User::create([
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'role_id' => $data['role_id'],
            ]);
            if ($user) {
                Mail::send(new CreationUtilisateurMail($user));
            }
            return redirect()->back()->with('success', 'L\'utilisateur à été créer');
        }
    }
}
