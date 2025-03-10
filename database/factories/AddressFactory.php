<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'professionnal' => $this->faker->boolean,
            'civility' => $this->faker->randomElement(['M', 'Mme', 'M.']),
            'name' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'company' => $this->faker->boolean ? $this->faker->company : null, // 50% de chance d'avoir une entreprise
            'address' => $this->faker->streetAddress,
            'addressbis' => $this->faker->boolean(30) ? $this->faker->secondaryAddress : null, // 30% de chance d'avoir une adresse secondaire
            'bp' => $this->faker->boolean(20) ? $this->faker->postcode : null, // 20% de chance d'avoir une boîte postale
            'postal' => $this->faker->postcode,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'user_id' => User::factory(), // Crée un utilisateur ou associe un utilisateur existant
            'country_id' => Country::inRandomOrder()->first()->id ?? Country::factory(), // Sélectionne un pays existant ou en
        ];
    }
}