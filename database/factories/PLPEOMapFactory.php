<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PLPEOMapModel;

class PLPEOMapFactory extends Factory
{
    protected $model = PLPEOMapModel::class;

    public function definition(): array
    {
        return [
            'id_pl' => 1,
            'id_peo' => 1,
        ];
    }
}
