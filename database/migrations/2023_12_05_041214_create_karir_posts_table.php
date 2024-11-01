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
        Schema::create('karir_posts', function (Blueprint $table) {
            $table->id('karir_post_id');
            $table->string('title');
            $table->string('author');
            $table->string('kategori');
            $table->string('tema');
            $table->text('content');
            $table->string('url_event');
            $table->string('guidebook')->nullable();
            $table->string('banner_img')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir_posts');
    }
};
