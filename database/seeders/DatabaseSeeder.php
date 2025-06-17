<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Address, Country, Page, Post};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Country::insert([
            ['name' => 'France', 'tax' => 0.2],
            ['name' => 'Belgique', 'tax' => 0.2],
            ['name' => 'Suisse', 'tax' => 0],
            ['name' => 'Canada', 'tax' => 0],
        ]);
        // User::factory(10)->create();

        User::factory()
            ->count(20)
            ->create()
            ->each(function ($user) {
                $user->addresses()->createMany(
                    Address::factory()->count(mt_rand(2, 3))->make()->toArray()
                );
            });

        $user = User::find(1);
        $user->admin = true;
        $user->save();

        $this->call([
            CategoryBlogSeeder::class,
            PostSeeder::class
        ]);

        $adminUser = new User();
        $adminUser->name = env('ADMIN_FIRSTNAME', 'Administrateur');
        $adminUser->firstname = env('ADMIN_NAME', 'PRINCIPAL');
        $adminUser->newsletter = true;
        $adminUser->admin = true;
        $adminUser->email = env('ADMIN_EMAIL', 'admin@example.com');
        $adminUser->password = Hash::make(env('ADMIN_PASSWORD', 'password'));
        $adminUser->save();

        $items = [
            ['livraisons', 'Livraisons'],
            ['mentions-legales', 'Mentions légales'],
            ['conditions-generales-de-vente', 'Conditons générales de vente'],
            ['politique-de-confidentialite', 'Politique de confidentialité'],
            ['respect-environnement', 'Respect de l\'environnement'],
            ['mandat-administratif', 'Mandat administratif'],
        ];

        foreach ($items as $item) {
            Page::factory()->create([
                'slug' => $item[0],
                'title' => $item[1],
            ]);
        }
    }
}
