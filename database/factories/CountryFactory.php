<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->country,
            'tax' => $this->faker->randomFloat(2, 0, 30), // Génère un taux de taxe entre 0 et 30 avec 2 décimales
        ];
    }
}