<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('beasiswa', function (Blueprint $table) {
            $table->string('beasiswa_img')->default('default_image.jpg')->change();
        });
    }
    
    public function down()
    {
        Schema::table('beasiswa', function (Blueprint $table) {
            $table->string('beasiswa_img')->nullable(false)->change();
        });
    }
    
};