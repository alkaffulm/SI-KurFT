<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TahunAkademikModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tahun_akademik' => $this->faker->year . '/' . ($this->faker->year + 1),
        ];
    }
}