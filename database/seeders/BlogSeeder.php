<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class BlogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('blogs')->insert(
        [
            [
                'title' => 'Los beneficios de los protectores solares para todo el año',
                'category' => 'Cuidado de la Piel',
                'description' => 'Descubre por qué es importante usar protector solar durante todo el año y cómo te beneficia.',
                'content' => 'Muchas personas creen que solo necesitan protector solar durante el verano, pero la realidad es que los rayos UV están presentes todo el año. Incluso en días nublados, tu piel está expuesta a los efectos dañinos del sol. Usar protector solar de forma regular, ya sea en invierno o en días sin sol, previene el envejecimiento prematuro y reduce el riesgo de cáncer de piel. Marcas como Eucerin y Vichy ofrecen protectores solares con fórmulas ligeras que se adaptan a diferentes tipos de piel, brindando la protección necesaria sin dejar una sensación grasosa. Este artículo te ayudará a entender los beneficios de aplicar protector solar durante todo el año y cómo incorporar este hábito en tu rutina diaria de cuidado de la piel.',
                'release_date' => '2024-09-25T10:30:00',
                'cover' => 'covers/beneficios_protector_solar.jpg',
                'cover_description' => 'Mujer poniéndose protector solar feliz.',
            ],
            [
                'title' => 'La importancia de proteger la piel de los rayos UV',
                'category' => 'Salud',
                'description' => 'Aprende cómo los rayos UV dañan tu piel y cómo protegerla correctamente con los mejores productos.',
                'content' => 'El daño solar no es solo un problema estético, también puede ser una amenaza seria para la salud de tu piel. Los rayos ultravioleta (UV) del sol son la principal causa de envejecimiento prematuro, manchas oscuras y, en los casos más graves, cáncer de piel. En este blog, te explicamos cómo los protectores solares actúan como una barrera contra los rayos UVA y UVB, protegiendo la piel desde el primer momento de aplicación. Además, analizamos la diferencia entre filtros físicos y químicos, para que puedas elegir el que mejor se ajuste a tu piel. También descubrirás cómo las nuevas tecnologías en la formulación de protectores solares, como los productos de Vichy y La Roche-Posay, ofrecen texturas innovadoras que no dejan residuos blancos ni una sensación pegajosa.',
                'release_date' => '2024-09-22T14:45:00',
                'cover' => 'covers/importancia_uv.jpg',
                'cover_description' => 'Mono mirando su piel en el espejo.',
            ],
            [
                'title' => 'Top 5 protectores solares recomendados por dermatólogos',
                'category' => 'Cuidado de la Piel',
                'description' => 'Una lista de los mejores protectores solares recomendados por dermatólogos que puedes encontrar en Farmasolar.',
                'content' => 'Con tantas opciones en el mercado, encontrar el protector solar ideal puede ser una tarea abrumadora. Para ayudarte a tomar una decisión informada, hemos consultado con dermatólogos y recopilado una lista de los cinco mejores protectores solares disponibles en Farmasolar. Desde fórmulas de amplio espectro hasta productos con ingredientes anti-edad, estos protectores no solo protegen tu piel del sol, sino que también ofrecen beneficios adicionales como hidratación y prevención de manchas. Entre los más recomendados se encuentran el protector solar Vichy Capital Soleil con ácido hialurónico, y el Eucerin Sun Gel-Cream Oil Control, ideal para pieles grasas. Sigue leyendo para descubrir por qué estos productos son los favoritos de los expertos y cómo pueden convertirse en un aliado fundamental en tu rutina diaria de cuidado de la piel.',
                'release_date' => '2024-10-01T11:00:00',
                'cover' => 'covers/top_5_mejores_protectores_solares.jpg',
                'cover_description' => 'Dermatológos juntos sonriendo.',
            ],
            [
                'title' => 'Cómo elegir el protector solar perfecto según tu tipo de piel',
                'category' => 'Consejos de Belleza',
                'description' => 'Te ayudamos a elegir el protector solar que mejor se ajuste a tu tipo de piel, con recomendaciones de las mejores marcas.',
                'content' => 'El protector solar adecuado puede hacer una gran diferencia en la salud y apariencia de tu piel, pero no todos los protectores solares son iguales. A la hora de elegir uno, es importante tener en cuenta tu tipo de piel. Si tienes piel grasa, busca un protector solar con fórmula no comedogénica que no obstruya los poros, como el Eucerin Sun Gel-Cream. Para piel seca, los protectores solares con ingredientes hidratantes, como el Vichy Capital Soleil SPF 50+, son una excelente opción. Las personas con piel sensible deben optar por productos con filtros físicos, como el La Roche-Posay Anthelios, que ofrecen una barrera natural contra los rayos UV sin irritar la piel. En este artículo te ofrecemos una guía detallada para ayudarte a elegir el protector solar que mejor se adapte a las necesidades específicas de tu piel, con recomendaciones de las mejores marcas disponibles en Farmasolar.',
                'release_date' => '2024-09-29T09:00:00',
                'cover' => 'covers/tipos_de_pieles.jpg',
                'cover_description' => 'Chica haciendo su rutina del cuidado de la piel.',
            ],
            [
                'title' => 'Cómo proteger tu piel del envejecimiento prematuro',
                'category' => 'Cuidado Anti-Edad',
                'description' => 'Descubre cómo los protectores solares pueden ayudar a prevenir el envejecimiento prematuro de la piel.',
                'content' => 'El envejecimiento prematuro de la piel es un fenómeno comúnmente causado por la exposición al sol sin la protección adecuada. Los rayos UV aceleran la aparición de arrugas, líneas finas y manchas oscuras, además de dañar la estructura interna de la piel. Afortunadamente, el uso constante de protectores solares de amplio espectro puede prevenir estos efectos. En este artículo, exploramos cómo productos como el Eucerin Photoaging Control SPF 50+ están formulados específicamente para combatir los signos del envejecimiento, protegiendo y regenerando la piel. Además, te ofrecemos consejos sobre cómo incorporar el protector solar en tu rutina de cuidado anti-edad y cuáles son los ingredientes clave que debes buscar en estos productos. Descubre cómo la protección solar es la mejor inversión para mantener una piel joven y saludable por más tiempo.',
                'release_date' => '2024-09-28T16:30:00',
                'cover' => 'covers/evitar_envejecimiento_prematuro.jpg',
                'cover_description' => 'Anciana mirándose en el espejo cuidándose su piel.',
            ],
        ]);
    }
}
