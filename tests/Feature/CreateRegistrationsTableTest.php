<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateRegistrationsTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_registrations_table()
    {
        // Jalankan migrasi
        $this->artisan('migrate');

        // Pastikan tabel 'registrations' ada
        $this->assertTrue(\Schema::hasTable('registrations'));

        // Verifikasi kolom yang ada di tabel
        $this->assertTrue(\Schema::hasColumn('registrations', 'id'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'name'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'email'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'phone'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'event_origin'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'created_at'));
        $this->assertTrue(\Schema::hasColumn('registrations', 'updated_at'));
    }
}
