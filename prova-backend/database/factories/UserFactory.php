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
            'telefon' => $this->faker->phoneNumber(),
            'edat' => $this->faker->numberBetween(0, 99), // Edad entre 18 y 65
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
