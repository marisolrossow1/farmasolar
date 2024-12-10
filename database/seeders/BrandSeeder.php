<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'La Roche Posay',
                'description' => 'La Roche Posay es una marca farmacéutica del grupo L\'Oreal, nacida en 1995 y recomendada por más de 25.000 dermatólogos de todo el mundo para el desarrollo de fórmulas minimalistas idóneas para el cuidado de la piel sensible y la prevención de las enfermedades cutáneas más importantes.',
            ],
            [
                'name' => 'Vichy',
                'description' => 'Desde sus inicios, Vichy se ha caracterizado por su enfoque holístico del cuidado de la piel y su apuesta por los ingredientes cosméticos respaldados por evidencia científica. El Doctor Prosper Haller utilizó el agua termal de Vichy para tratar las cicatrices de sus pacientes, lo que llevó al éxito de la marca.',
            ],
            [
                'name' => 'Eucerin',
                'description' => 'Hoy Eucerin es una marca de cuidado de la piel, lider a nivel mundial, que ofrece una amplia gama de productos dermo-cosméticos que satisfacen las diferentes necesidades de la piel según los últimos estándares dermatológicos y son recomendados todos los días por dermatólogos y farmacéuticos de todo el mundo.',
            ],
            [
                'name' => 'Isdin',
                'description' => 'ISDIN rápidamente se convirtió en referencia internacional en dermatología, gracias a su tecnología puntera y constante innovación. Hoy en día, en más de 40 países disfrutan de nuestra gama.',
            ],
            [
                'name' => 'Dermaglós',
                'description' => 'Dermaglós te acompaña en todas las etapas de la vida. Con más de 50 años de trayectoria en el mercado, nuestras líneas de productos cuidan la piel con el respaldo de Laboratorios Andrómaco, un laboratorio con un siglo de historia.',
            ],
            [
                'name' => 'Bagovit',
                'description' => 'Bagóvit Solar: Formulada con filtros solares de amplio espectro que protegen la piel de los rayos UV-A/UV-B evitando el daño causado por el sol. Además, posee agentes humectantes que brindan profunda hidratación y efecto balsámico. Su uso regular previene el envejecimiento prematuro de la piel.',
            ],
            [
                'name' => 'Avene',
                'description' => 'Avène, una marca de Ciencia y Consciencia. Los Laboratorios Dermatológicos Avène están comprometidos en proteger la humanidad y preservar el medioambiente, creando una carta que expresa plenamente los valores de la marca como especialista en pieles sensibles.',
            ],            
        ]);
    }
}
