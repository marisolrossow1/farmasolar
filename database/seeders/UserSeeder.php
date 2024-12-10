<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
     {

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Carlos',
                'email' => 'carlos@ferrer.com',
                'role_id' => 1,
                'password' => Hash::make('123456')
            ],
            [
                'id' => 2,
                'name' => 'Marisol',
                'email' => 'marisol@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('123456')
            ],
            [
                'id' => 3,
                'name' => 'Melina',
                'email' => 'melina@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('123456')
            ],
        ]);

}

}