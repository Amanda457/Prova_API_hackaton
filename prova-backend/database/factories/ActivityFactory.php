<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'descripcio' => $this->faker->sentence(45),
            'capacitat_maxima' => $this->faker->numberBetween(5, 50),
        ];
    }
}
