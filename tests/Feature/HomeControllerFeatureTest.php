<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerFeatureTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * @return void
     */
    public function test_index_return_a_successful_response(): void
    {
        // Envoie une requête GET
        $response = $this->get('/');

        // Vérifie que le code de statut de la réponse est 200 (OK)
        $response->assertStatus(200);

        // Vérifie que la vue 'index' est utilisée pour le rendu
        $response->assertViewIs('index');

        // Vérifie que la variable 'avis' est disponible dans la vue
        $response->assertViewHas('avis');

        // Vérifie que la variable 'horaires' est disponible dans la vue
        $response->assertViewHas('horaires');


    }

    /**
     * @return void
     */
    public function test_show_services_return_a_successful_response(): void
    {
        // Envoie une requête GET
        $response = $this->get('/nos-services');

        // Vérifie que le code de statut de la réponse est 200 (OK)
        $response->assertStatus(200);

        // Vérifie que la vue 'service' est utilisée pour le rendu
        $response->assertViewIs('service');

        // Vérifie que les variables 'services' et 'horaires' sont  dans la vue
        $response->assertViewHasAll(['services', 'horaires']);

    }

    /**
     * @return void
     */
    public function test_show_habitats_return_a_successful_response(): void
    {
        // Envoie une requête GET
        $response = $this->get('/nos-habitats');

        // Vérifie que le code de statut de la réponse est 200 (OK)
        $response->assertStatus(200);

        // Vérifie que la vue 'habitat' est utilisée pour le rendu
        $response->assertViewIs('habitat');

        // Vérifie que la variable 'habitats' est disponible dans la vue
        $response->assertViewHas('habitats');

        // Vérifie que la variable 'horaires' est disponible dans la vue
        $response->assertViewHas('horaires');


    }

    /**
     * @return void
     */
    public function test_show_contact_return_a_successful_response(): void
    {
        // Envoie une requête GET
        $response = $this->get('/contact');

        // Vérifie que le code de statut de la réponse est 200 (OK)
        $response->assertStatus(200);

        // Vérifie que la vue 'contact' est utilisée pour le rendu
        $response->assertViewIs('contact');
        
        // Vérifie que la variable 'horaires' est disponible dans la vue
        $response->assertViewHas('horaires');
    }


}
