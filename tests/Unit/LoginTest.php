<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_login_user_successfully(): void
    {
        $user = User::create([
            'nom' => 'test',
            'prenom' => 'test',
            'username' => 'test12@example.com',
            'password' => Hash::make('Password'),
        ]);

        // Simule la tentative de connexion et la récupération de l'utilisateur
        Auth::shouldReceive('attempt')->once()->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);

        // Création de la requête
        $response = $this->post('/login', [
            'username' => 'test12@example.com',
            'password' => 'Password',
        ]);

        // Vérifie que la  redirection vers 'gestion'
        $response->assertRedirect('gestion');
    }
    public function test_logout_successfully()
    {
        // Crée un utilisateur et le connecte
        $user = User::create([
            'nom' => 'test',
            'prenom' => 'test',
            'username' => 'test123@example.com',
            'password' => Hash::make('Password'),
        ]);
        $this->actingAs($user);

        // Envoie une requête GET à la route de déconnexion
        $response = $this->get('/logout');

        // Vérifie que la redirection est effectuée
        $response->assertRedirect('/');

        // Vérifie que l'utilisateur est déconnecté
        $this->assertFalse(auth()->check());
    }
}
