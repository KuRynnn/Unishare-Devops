<?php

namespace Database\Factories;

use App\Models\Beasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeasiswaFactory extends Factory
{
    protected $model = Beasiswa::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'jenis_beasiswa' => $this->faker->word,
            'penyelenggara_beasiswa' => $this->faker->company,
            'due_date_beasiswa' => $this->faker->date,
            'deskripsi_beasiswa' => $this->faker->paragraph,
            'beasiswa_url' => $this->faker->url,
            'beasiswa_img' => 'default_image.jpg', // Default or fake image path
        ];
    }

}