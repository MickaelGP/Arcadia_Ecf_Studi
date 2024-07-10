<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_login_user_successful(): void
    {
        $user = User::create([
            'nom' => 'test',
            'prenom' => 'test',
            'username' => 'test@example.com',
            'password' => Hash::make('Password'),
        ]);

        // Simule la tentative de connexion et la récupération de l'utilisateur
        Auth::shouldReceive('attempt')->once()->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);

        // Création de la requête
        $response = $this->post('/login', [
            'username' => 'test@example.com',
            'password' => 'Password',
        ]);

        // Vérifie que la  redirection vers 'gestion'
        $response->assertRedirect('gestion');
    }
}
