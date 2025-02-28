<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::insert([
            ['name' => 'France', 'tax' => 0.2],
            ['name' => 'Belgique', 'tax' => 0.2],
            ['name' => 'Suisse', 'tax' => 0],
            ['name' => 'Canada', 'tax' => 0],
        ]);
    }
}
