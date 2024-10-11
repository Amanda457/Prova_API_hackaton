<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->firstName(),
            'cognom' => $this->faker->lastName(),
            'telefon' => $this->faker->numberBetween(000000000, 999999999),
            'edat' => $this->faker->numberBetween(0, 99),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
