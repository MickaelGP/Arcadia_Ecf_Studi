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

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('index');
        $response->assertViewHas('avis');
        $response->assertViewHas('horaires');


    }

    /**
     * @return void
     */
    public function test_show_services_return_a_successful_response(): void
    {

        $response = $this->get('/nos-services');

        $response->assertStatus(200);
        $response->assertViewIs('service');
        $response->assertViewHasAll(['services', 'horaires']);

    }

    /**
     * @return void
     */
    public function test_show_habitats_return_a_successful_response(): void
    {

        $response = $this->get('/nos-habitats');

        $response->assertStatus(200);
        $response->assertViewIs('habitat');
        $response->assertViewHas('habitats');
        $response->assertViewHas('horaires');


    }

    /**
     * @return void
     */
    public function test_show_contact_return_a_successful_response(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('contact');
        $response->assertViewHas('horaires');
    }


}
