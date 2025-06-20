<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agence>
 */
class AgenceFactory extends Factory
{

    protected $model = Agency::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'address' => fake()->address,
            'email' => fake()->email,
            'phone' =>fake()->phoneNumber,
           'holder' => strtoupper(fake()->sentence(3)),
            'bic' => strtoupper(str()->random(8)),
            'iban' => fake()->iban,
            'bank' => fake()->sentence(2),
            'bank_address' => fake()->address,
            'facebook' => 'https://www.facebook.com/' . fake()->userName(),
            'home' => fake()->sentence(3),
            'home_infos' => fake()->text,
            'home_shipping' => fake()->boolean(),
            'invoice' => fake()->boolean(),
            'card' => fake()->boolean(),
            'transfer' => fake()->boolean(),
            'check' => fake()->boolean(),
            'mandat' => fake()->boolean(),
        ];
    }
}
