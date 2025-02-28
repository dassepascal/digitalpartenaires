<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Realisation;
use App\Models\Category;

class RealisationSeeder extends Seeder
{
    public function run()
    {
        // Créez des catégories si elles n'existent pas déjà
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $categories = Category::factory()->count(3)->create([
                ['name' => 'E-commerce'],
                ['name' => 'Site vitrine'],
                ['name' => 'Blog'],
            ]);
        }

        // Créez 10 réalisations
        Realisation::factory()->count(10)->create()->each(function ($realisation) use ($categories) {
            // Associez chaque réalisation à au moins une catégorie
            $realisation->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
