<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SunscreenSeeder; // agregamos
use Database\Seeders\BlogSeeder; // agregamos
use Database\Seeders\ApplicationSeeder; 
use Database\Seeders\UserSeeder; 
use Database\Seeders\RoleSeeder; 
use Database\Seeders\OrderSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //    'name' => 'Carlos',
        //    'email' => 'carlosferrer@gmail.com',
        // ]);

        // $this->call(SunscreenSeeder::class);

        // $this->call(BlogSeeder::class);

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            BrandSeeder::class,
            SpfSeeder::class,
            ApplicationSeeder::class,
            SunscreenSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
