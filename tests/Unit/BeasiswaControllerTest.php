<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Beasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BeasiswaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_a_beasiswa_post_successfully()
    {
        // Buat data dummy untuk pengujian
        $beasiswa = Beasiswa::factory()->create([
            'title' => 'Beasiswa Lama',
            'jenis_beasiswa' => 'Jenis Lama',
            'penyelenggara_beasiswa' => 'Penyelenggara Lama',
            'due_date_beasiswa' => '2024-12-31',
            'deskripsi_beasiswa' => 'Deskripsi lama',
            'beasiswa_url' => 'http://example.com',
        ]);

        // Data baru untuk update
        $updatedData = [
            'title' => 'Beasiswa Baru',
            'jenis_beasiswa' => 'Jenis Baru',
            'penyelenggara_beasiswa' => 'Penyelenggara Baru',
            'due_date_beasiswa' => '2025-01-01',
            'deskripsi_beasiswa' => 'Deskripsi baru',
            'beasiswa_url' => 'http://example.com/new',
        ];

        // Kirim request ke route update
        $response = $this->post(route('update-beasiswa', $beasiswa->id), $updatedData);

        // Pastikan response redirect ke halaman admin
        $response->assertRedirect(route('admin'));

        // Verifikasi data telah ter-update di database
        $this->assertDatabaseHas('beasiswa', [
            'id' => $beasiswa->id,
            'title' => 'Beasiswa Baru',
            'jenis_beasiswa' => 'Jenis Baru',
            'penyelenggara_beasiswa' => 'Penyelenggara Baru',
            'due_date_beasiswa' => '2025-01-01',
            'deskripsi_beasiswa' => 'Deskripsi baru',
            'beasiswa_url' => 'http://example.com/new',
        ]);
    }

    /** @test */
    public function it_deletes_a_beasiswa_post_successfully()
    {
        // Buat data dummy untuk pengujian
        $beasiswa = Beasiswa::factory()->create();

        // Kirim request ke route delete
        $response = $this->get(route('delete-beasiswa', $beasiswa->id));

        // Pastikan response redirect ke halaman admin
        $response->assertRedirect(route('admin'));

        // Pastikan data tidak ada lagi di database
        $this->assertDatabaseMissing('beasiswa', [
            'id' => $beasiswa->id,
        ]);
    }
}