<?php

namespace Database\Factories;

use App\Models\Realisation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Realisation>
 */
class RealisationFactory extends Factory
{


    protected $model = Realisation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'url' => $this->faker->url,
        ];
    }
}
