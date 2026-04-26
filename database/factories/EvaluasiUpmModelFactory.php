<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EvaluasiUpmModel;
class EvaluasiUpmModelFactory extends Factory
{
    protected $model = EvaluasiUpmModel::class; 

    public function definition(): array
    {
        return [
            'id_ps' => 1,
            'id_tahun_akademik' => 1,
            'catatan' => $this->faker->sentence(),
        ];
    }
}