<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramStudiModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_prodi' => $this->faker->randomElement([
                'Teknologi Informasi',
                'Teknik Sipil',
                'Teknik Pertambangan',
                'Teknik Mesin'
            ]),
        ];
    }
}