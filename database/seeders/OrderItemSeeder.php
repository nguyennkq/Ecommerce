<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert(
            [
                [
                    'order_id' => '1',
                    'product_id' => '1',
                    'quantity' => '5',
                    'price' => '564000',
                    'color' => 'trắng,đen',
                    'size' => 'M',
                ],
                [
                    'order_id' => '2',
                    'product_id' => '2',
                    'quantity' => '4',
                    'price' => '464000',
                    'color' => 'xanh,đen',
                    'size' => 'L',
                ],
                [
                    'order_id' => '3',
                    'product_id' => '3',
                    'quantity' => '3',
                    'price' => '364000',
                    'color' => 'trắng,xanh',
                    'size' => 'M',
                ],
                [
                    'order_id' => '4',
                    'product_id' => '4',
                    'quantity' => '2',
                    'price' => '314000',
                    'color' => 'trắng,đen',
                    'size' => 'S',
                ],
                [
                    'order_id' => '5',
                    'product_id' => '5',
                    'quantity' => '1',
                    'price' => '164000',
                    'color' => 'đen',
                    'size' => 'M',
                ]
            ]
        );
    }
}
