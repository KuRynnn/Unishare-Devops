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
        $response->assertViewIs('pendaftaran-event'); 
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
