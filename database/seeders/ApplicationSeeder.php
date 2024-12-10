<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'type' => 'Rostro',
                'application_mode' => 'Aplicar una capa uniforme sobre el rostro limpio y seco.',
                'side_effects' => 'Evitar el contacto con los ojos.',
            ],
            [
                'type' => 'Cuello',
                'application_mode' => 'Aplicar una pequeña cantidad en el cuello y masajear suavemente hasta su absorción completa.',
                'side_effects' => 'No aplicar sobre piel irritada o con heridas abiertas.',
            ],
            [
                'type' => 'Cuerpo',
                'application_mode' => 'Agitar bien antes de usar. Aplicar generosamente y extender de manera uniforme sobre la piel expuesta.',
                'side_effects' => 'Mantener alejado del calor y de fuentes de ignición.',
            ],
        ]);
    }
}
