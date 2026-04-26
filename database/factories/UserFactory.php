<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserFactory extends Factory
{
    protected $model = UserModel::class;

    public function definition(): array
    {
        return [
            'NIP' => fake()->unique()->numerify('###############'),
            'username' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => Hash::make('password123'),
            'last_active_kurikulum_id' => null,
        ];
    }
}