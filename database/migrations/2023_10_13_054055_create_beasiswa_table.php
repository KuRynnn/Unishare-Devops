<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('jenis_beasiswa');
            $table->dateTime('due_date_beasiswa');
            $table->string('penyelenggara_beasiswa');
            $table->text('deskripsi_beasiswa');
            $table->text('beasiswa_img');
            $table->text('beasiswa_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
