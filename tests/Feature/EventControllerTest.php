<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Registration;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function showForm()
    {
        $response = $this->get(route('event.form'));
    
        // Assert the response is a view
        $response->assertStatus(200);
        $response->assertViewIs('pendaftaran-event'); // Update this to match the view file name
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
