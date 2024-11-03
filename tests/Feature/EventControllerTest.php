<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Registration;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_event_registration_form()
    {
        $response = $this->get(route('event.form'));

        $response->assertStatus(200);
        $response->assertViewIs('pendaftaran-event'); // 
    }

    /** @test */
    public function it_registers_a_user_for_an_event()
    {
        $formData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'event_origin' => 'Example Event',
        ];

        $response = $this->post(route('event.register'), $formData);

        $response->assertStatus(302); 
        $response->assertRedirect(route('event.form')); 

        

        
        $this->assertDatabaseHas('registrations', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'event_origin' => 'Example Event',
        ]);
    }

    /** @test */
    public function it_requires_all_fields_to_register()
    {
        $response = $this->post(route('event.register'), []);

        $response->assertSessionHasErrors([
            'name', 'email', 'phone', 'event_origin'
        ]);
    }
}
