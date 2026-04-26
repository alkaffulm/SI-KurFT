<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PEOModel;

class PEOFactory extends Factory
{
    protected $model = PEOModel::class;

    public function definition(): array
    {
        return [
            'id_ps' => 1, // nanti kita inject di test
            'id_kurikulum' => 1, // nanti inject juga
            'kode_peo' => 'P' . $this->faker->unique()->numberBetween(1, 99),
            'desc_peo_id' => $this->faker->sentence(),
            'desc_peo_en' => $this->faker->sentence(),
        ];
    }
}