<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $datas = [

        ];
        return [
            // créer 3 category
            // category 1 = E-commerce
            // category 2 = Site vitrine
            // category 3 = Blog

            ['name' => 'E-commerce'],
            ['name' => 'Site vitrine'],
            ['name' => 'Blog'],


        ];
    }
}
