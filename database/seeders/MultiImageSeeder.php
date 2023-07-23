<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MultiImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('multi_images')->insert([
            [
                'product_id' => 1,
                'image' => 'https://picsum.photos/200/300',
            ],
            [
                'product_id' => 3,
                'image' => 'https://picsum.photos/200/100',
            ], [
                'product_id' => 4,
                'image' => 'https://picsum.photos/200/200',
            ],
            [
                'product_id' => 5,
                'image' => 'https://picsum.photos/200/400',
            ],
            [
                'product_id' => '6',
                'image' => 'https://picsum.photos/200/500',
            ]
        ]);
    }
}
