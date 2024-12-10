<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spfs')->insert([
            [
                'value' => 30,         
                'description' => 'Protección media, adecuada para uso diario.',
                'recommended_usage' => 'Uso diario, aplicar cada 2 horas.',
                'protection_hours' => 2,
            ],
            [
                'value' => 40,         
                'description' => 'Protección alta, adecuada para actividades al aire libre.',
                'recommended_usage' => 'Ideal para deportes al aire libre.',
                'protection_hours' => 3,
            ],
            [
                'value' => 50,         
                'description' => 'Protección muy alta, excelente para piel sensible.',
                'recommended_usage' => 'Recomendado para piel sensible.',
                'protection_hours' => 4,
            ],
            [
                'value' => 65,         
                'description' => 'Protección ultra alta, uso en condiciones extremas.',
                'recommended_usage' => 'Para uso en condiciones extremas.',
                'protection_hours' => 5,
            ],
            [
                'value' => 100,         
                'description' => 'Protección máxima, para personas con piel muy sensible.',
                'recommended_usage' => 'Uso en exposiciones solares prolongadas.',
                'protection_hours' => 6,
            ],
        ]);
    }
}
