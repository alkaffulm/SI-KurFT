<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProfilLulusanModel;

class ProfilLulusanFactory extends Factory
{
    protected $model = ProfilLulusanModel::class;

    public function definition(): array
    {
        return [
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'kode_pl' => 'PL-' . $this->faker->unique()->numberBetween(1, 100),
            'nama_pl_id' => $this->faker->words(3, true),
            'nama_pl_en' => $this->faker->words(3, true),
            'desc_pl_id' => $this->faker->sentence(),
            'desc_pl_en' => $this->faker->sentence(),
            'profesi' => $this->faker->jobTitle(),
        ];
    }
}