<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 2,
                'products' => json_encode([
                    [
                        'id' => 1, 
                        'title' => 'Protector solar invisble uvmune spf50 La Roche Posay', 
                        'price' => 20999,
                        'quantity' => 1
                    ],
                    [
                        'id' => 10, 
                        'title' => 'Protector solar facial Fps50 toque seco sin color Isdin', 
                        'price' => 22845,
                        'quantity' => 1
                    ],
                    [
                        'id' => 19, 
                        'title' => 'Protector solar spray naranja spf 50+ Avene', 
                        'price' => 27129,
                        'quantity' => 3
                    ],
                ]),
                'status' => 1,
                'date' => '2024-09-04 04:04:52',
                'total' => 125231.00,
            ],
            [
                'user_id' => 2,
                'products' => json_encode([
                    [
                        'id' => 7, 
                        'title' => 'Protector solar actinic control fps100 Eucerin', 
                        'price' => 51757,
                        'quantity' => 3
                    ]
                ]),
                'status' => 1,
                'date' => '2024-11-04 04:04:52',
                'total' => 103514.00,
            ],
            [
                'user_id' => 2,
                'products' => json_encode([
                    [
                        'id' => 13, 
                        'title' => 'Protector solar fps 50 emulsión Dermaglós solar', 
                        'price' => 9946,
                        'quantity' => 1
                    ],
                    [
                        'id' => 14, 
                        'title' => 'Protector en crema Fps65 Dermaglós solar', 
                        'price' => 9429,
                        'quantity' => 1
                    ],
                    [
                        'id' => 15, 
                        'title' => 'Protector en spray invisible spray Fps30 Dermaglós solar', 
                        'price' => 12568,
                        'quantity' => 1
                    ],
                ]),
                'status' => 1,
                'date' => '2024-12-04 04:04:52',
                'total' => 125231.00,
            ],
            [
                'user_id' => 3,
                'products' => json_encode([
                    [
                        'id' => 17, 
                        'title' => 'Protector solar fps40 spray Bagovit', 
                        'price' => 16074,
                        'quantity' => 6
                    ]
                ]),
                'status' => 1,
                'date' => '2024-08-04 04:04:52',
                'total' => 96444.00,
            ],
            [
                'user_id' => 3,
                'products' => json_encode([
                    [
                        'id' => 20, 
                        'title' => 'Ave solar intense protect SPF50+ Avene', 
                        'price' => 26275,
                        'quantity' => 2
                    ],
                    [
                        'id' => 10, 
                        'title' => 'Protector solar facial Fps50 toque seco sin color Isdin', 
                        'price' => 22845,
                        'quantity' => 3
                    ],
                    [
                        'id' => 4, 
                        'title' => 'Capital Soleil UV age daily Spf 50 Vichy', 
                        'price' => 23483,
                        'quantity' => 2
                    ],
                ]),
                'status' => 1,
                'date' => '2024-09-04 04:04:52',
                'total' => 168051.00,
            ],


        ]);
    }
}
