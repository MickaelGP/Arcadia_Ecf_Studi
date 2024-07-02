<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailControllerFeatureTest extends TestCase
{
    /**
     * @return void
     */
    public function test_sending_mail_successful(): void
    {
        // Simule un envoie de mail
        Mail::fake();

        // Envoie d'une requête POST
        $response = $this->post('/contact', [
            'titre' => 'Test email',
            'pseudo' => 'PhpUnitTesteur',
            'email' => 'phpunit@phpunit.fr',
            'description' => 'Test envoie mail'
        ]);

        // Vérifie que la réponse redirige vers /contact
        $response->assertRedirect('/contact');
        // Vérifie qu'il n'y a pas d'erreurs
        $response->assertSessionHasNoErrors();
        // Vérifie que le message success existe dans la session
        $response->assertSessionHas('success');

        // Vérifie q'un mail a été envoyé
        Mail::assertSent(ContactFormMail::class);

    }

    /**
     * @return void
     */
    public function test_sending_mail_with_errors(): void
    {
        // Envoie d'une requête POST avec des données invalides
        $response = $this->post('/contact', [
            'titre' => 'Tes',
            'pseudo' => 'Php',
            'email' => 'phpunit.fr',
            'description' => 'Test envoie mail'
        ]);

        // Vérifie la redirection
        $response->assertRedirect();

        // Vérifie la presence des erreurs spécifiques
        $response->assertSessionHasErrors(['email', 'pseudo', 'titre'] );

        // Vérifie que la saisie de l'utilisateur est préservée
        $response->assertSessionHasInput(['pseudo', 'email']);

    }
}
