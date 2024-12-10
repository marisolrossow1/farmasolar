<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sunscreen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SunscreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
     {

        DB::table('sunscreens')->insert([
            [       
                'brand_fk' => 1,      
                'spf_fk' => 3,    
                'title' => 'Protector solar invisble uvmune spf50 La Roche Posay',
                'description' => 'Protector solar invisble uvmune spf50 La Roche Posay 50ml protector solar que ofrece la más alta protección de rayos uvb, uva e incluso uva ultra largos.',
                'price' => 20999,
                'image' => 'roche_posay_uvmune_50.jpg',
            ],
            [           
                'brand_fk' => 1,   
                'spf_fk' => 3,       
                'title' => 'Protector anthelios uvmune 400 crema spf50 La Roche Posay',
                'description' => 'Protector anthelios uvmune 400 crema spf50 La Roche Posay 50ml es un protector solar que ofrece la más alta protección de rayos uvb.',
                'price' => 30264,
                'image' => 'roche_posay_50_400.jpg',
            ],
            [        
                'brand_fk' => 1,         
                'spf_fk' => 3,    
                'title' => 'Protector solar anthelios fps 50 bruma rostro La Roche Posay',
                'description' => 'Protector solar anthelios fps 50 bruma rostro La Roche Posay 75ml pantalla solar con mayor protección antibrillo invisible.',
                'price' => 33408,
                'image' => 'roche_posay_anthelios_50.jpg',
            ],
            [      
                'brand_fk' => 2, 
                'spf_fk' => 3,              
                'title' => 'Capital Soleil UV age daily Spf 50 Vichy',
                'description' => 'Capital Soleil UV age daily Spf 50 Vichy 50ml es un fotoprotector diario de rostro frente a los rayos UVB y UVA con eficacia antipolución previene signos de fotoenvejecimiento como manchas y arrugas.',
                'price' => 23483,
                'image' => 'capital_soleil_vichy_50.jpg',
            ],
            [     
                'brand_fk' => 2,   
                'spf_fk' => 3,             
                'title' => 'Protector solar cell protect fluido fps50+ Vichy',
                'description' => 'Protector solar cell protect fluido fps50+ Vichy de 200ml brinda protección avanzada en (UVB, UVA, UVA largo y antioxidante) para prevenir el daño solar.',
                'price' => 41025,
                'image' => 'vichy_cell_50.jpg',
            ],
            [      
                'brand_fk' => 2,     
                'spf_fk' => 3,          
                'title' => 'Ideal Soleil rostro anti manchas Fps50 Vichy',
                'description' => 'Ideal Soleil rostro anti manchas Fps50 Vichy 50ml cuidado protector anti manchas 3 en 1 con color enriquecida con Phe resorcinol para todo tipo de piel.',
                'price' => 24726,
                'image' => 'vichy_soleil_antimanchas_50.jpg',
            ],
            [     
                'brand_fk' => 3,       
                'spf_fk' => 5,         
                'title' => 'Protector solar actinic control fps100 Eucerin',
                'description' => 'Protector solar actinic control fps100 Eucerin facial de 80ml está certificado para la prevención de la queratosis actínica y el cáncer de piel no melanoma.',
                'price' => 51757,
                'image' => 'actinic_eucerin_100.jpg',
            ],
            [      
                'brand_fk' => 3,  
                'spf_fk' => 3,             
                'title' => 'Protector solar pigment control tono medio Eucerin',
                'description' => 'Protector solar pigment control tono medio Eucerin reduce eficazmente las manchas oscuras y evita su reaparición.',
                'price' => 20999,
                'image' => 'eucerin_pigment_control_medio.jpg',
            ],
            [    
                'brand_fk' => 3,      
                'spf_fk' => 3,           
                'title' => 'Protector solar sun corporal Fps50 spray Eucerin',
                'description' => 'Protector solar sun corporal Fps50 spray Eucerin 200ml no deja ningún residuo visible en la piel. Es completamente transparente no pegajoso no graso de absorción rápida y resistente al agua.',
                'price' => 37754,
                'image' => 'eucerin_corporal_spray_50.jpg',
            ],
            [
                'brand_fk' => 4,  
                'spf_fk' => 3,   
                'title' => 'Protector solar facial Fps50 toque seco sin color Isdin',
                'description' => 'Protector solar facial Fps50 toque seco sin color Isdin 50ml proporciona un efecto matificante, con toque seco ideal para la piel normal, mixta y grasa.',
                'price' => 22845,
                'image' => 'isdin_50.jpg',
            ],
            [
                'brand_fk' => 4,  
                'spf_fk' => 3,   
                'title' => 'Protector solar corporal Fps50 gel crema Isdin',
                'description' => 'Protector solar corporal Fps50 gel crema Isdin 250ml hidrata como una crema y se absorbe rápidamente como un gel. Proporciona una agradable sensación de frescor con un acabado sedoso y sin brillos.',
                'price' => 28764,
                'image' => 'isdin_50_gel.jpg',
            ],
            [
                'brand_fk' => 4,  
                'spf_fk' => 3,   
                'title' => 'Protector solar facial fluido fps100 eryfotona ak-nmsc Isdin',
                'description' => 'Protector solar facial fluido fps100 eryfotona ak-nmsc Isdin 50ml previene y repara el daño actínico.',
                'price' => 44483,
                'image' => 'isdin_fluido_100.jpg',
            ],
            [
                'brand_fk' => 5,  
                'spf_fk' => 3,   
                'title' => 'Protector solar fps 50 emulsión Dermaglós solar',
                'description' => 'Protector solar fps 50 emulsión Dermaglós solar 250ml hidrata y nutre la piel siendo ideal para pieles sensibles.',
                'price' => 9946,
                'image' => 'dermaglos_emulsion_50.jpg',
            ],
            [
                'brand_fk' => 5,  
                'spf_fk' => 4,   
                'title' => 'Protector en crema Fps65 Dermaglós solar',
                'description' => 'Protector en crema Fps65 Dermaglós solar 90g protector solar paras pieles sensibles con dermatosis foto agravadas (vitíligo u rosácea).',
                'price' => 9429,
                'image' => 'dermaglos_crema_65.jpg',
            ],
            [
                'brand_fk' => 5,  
                'spf_fk' => 1,   
                'title' => 'Protector en spray invisible spray Fps30 Dermaglós solar',
                'description' => 'Protector en spray invisible spray Fps30 Dermaglós solar 180ml ideal para hidratar y nutrir las pieles sensibles y las quemaduras previniendo el envejecimiento prematuro de la piel producido por los rayos solares.',
                'price' => 12568,
                'image' => 'dermaglos_spray_invisible_30.jpg',
            ],
            [
                'brand_fk' => 6,  
                'spf_fk' => 1,   
                'title' => 'Protector solar fps30 emulsión Bagovit',
                'description' => 'Protector solar fps30 emulsión Bagovit de 200ml sus filtros de amplio espectro UV-B y UV-A ayudan a prevenir las quemaduras solares.',
                'price' => 12595,
                'image' => 'bagovit_emulsion_30.jpg',
            ],
            [
                'brand_fk' => 6,  
                'spf_fk' => 2,   
                'title' => 'Protector solar fps40 spray Bagovit',
                'description' => 'Protector solar fps40 spray Bagovit de 170ml Gracias a su textura ultraliviana se esparce y se absorbe de manera inmediata sobre la piel.',
                'price' => 16074,
                'image' => 'bagovit_spray_40.jpg',
            ],
            [
                'brand_fk' => 6,  
                'spf_fk' => 1,   
                'title' => 'Protector solar fps30 spray Bagovit',
                'description' => 'Protector solar fps30 spray Bagovit de 170ml con textura ultraliviana se esparce y se absorbe de manera inmediata sobre la piel.',
                'price' => 14427,
                'image' => 'bagovit_spray_30.jpg',
            ],
            [
                'brand_fk' => 7,  
                'spf_fk' => 3,   
                'title' => 'Protector solar spray naranja spf 50+ Avene',
                'description' => 'Protector solar spray naranja spf 50+ Avene 200ml protección solar muy alta para pieles sensibles.',
                'price' => 27129,
                'image' => 'avene_spray_50.jpg',
            ],
            [
                'brand_fk' => 7,  
                'spf_fk' => 3,   
                'title' => 'Ave solar intense protect SPF50+ Avene',
                'description' => 'Protector solar SPF 50 de ultra-amplio espectro que cumple con los requisitos más exigentes, incluso para las pieles más vulnerables y en condiciones de luz solar más intensas.',
                'price' => 26275,
                'image' => 'avene_protect_50.jpg',
            ],            
            
        ]);

        // * Manejamos la tabla pivot
        // En la tabla Pivot agregaremos dos géneros por cada película
        DB::table('sunscreens_have_applications')->insert([
            ['sunscreen_fk' => 1, 'application_fk' => 2],
            ['sunscreen_fk' => 1, 'application_fk' => 1],
            ['sunscreen_fk' => 2, 'application_fk' => 3],
            ['sunscreen_fk' => 2, 'application_fk' => 1],
            ['sunscreen_fk' => 3, 'application_fk' => 3],
            ['sunscreen_fk' => 3, 'application_fk' => 2],
            ['sunscreen_fk' => 4, 'application_fk' => 2],
        ]);

     }
}
