<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    // protected $model = User::class;
    protected static ?string $password;

    public function definition(): array
    {
        return [
           'name' => fake()->lastName,
            'firstname' => fake()->firstName,
            'email' => fake()->unique()->safeEmail,
            'password' => static::$password ??= Hash::make('password'),
            'newsletter' => fake()->boolean(),
            'valid' => fake()->boolean(),
            'created_at' => fake()->dateTimeBetween('-4 years', '-6 months'),
            'remember_token' => Str::random(10),
        ];
    }

    // public function admin(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'role' => 'admin',
    //     ]);
    // }
}
