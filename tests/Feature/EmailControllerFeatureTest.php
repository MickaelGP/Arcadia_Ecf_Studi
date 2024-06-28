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
        Mail::fake();

        $response = $this->post('/contact', [
            'titre' => 'Test email',
            'pseudo' => 'PhpUnitTesteur',
            'email' => 'phpunit@phpunit.fr',
            'description' => 'Test envoie mail'
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');

        Mail::assertSent(ContactFormMail::class);

    }

    /**
     * @return void
     */
    public function test_sending_mail_with_errors(): void
    {
        $response = $this->post('/contact', [
            'titre' => 'Tes',
            'pseudo' => 'Php',
            'email' => 'phpunit.fr',
            'description' => 'Test envoie mail'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email', 'pseudo', 'titre'] );
        $response->assertSessionHasInput(['pseudo', 'email']);

    }
}
