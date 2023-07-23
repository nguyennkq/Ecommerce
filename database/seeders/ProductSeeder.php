<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => '1',
                'product_name' => 'Áo thun 1',
                'product_size' => 'S,M,L',
                'product_color' => 'trắng,đen',
                'product_slug' => 'ao-thun-1',
                'product_quantity' => '1000',
                'selling_price' => '235000',
                'discount_price' => '10000',
                'description' => 'Áo thun tay ngắn',
                'status' => 'inactive',
            ],
            [
                'category_id' => '1',
                'product_name' => 'Áo thun 2',
                'product_size' => 'S,M,L',
                'product_color' => 'trắng,đen',
                'product_slug' => 'ao-thun-2',
                'product_quantity' => '2000',
                'selling_price' => '321000',
                'discount_price' => '11000',
                'description' => 'Áo thun tay ngắn 2',
                'status' => 'inactive',
            ],
            [
                'category_id' => '1',
                'product_name' => 'Áo thun 3',
                'product_size' => 'S,M,L',
                'product_color' => 'trắng,đen',
                'product_slug' => 'ao-thun-3',
                'product_quantity' => '1000',
                'selling_price' => '236000',
                'discount_price' => '11000',
                'description' => 'Áo thun tay ngắn 3',
                'status' => 'inactive',
            ],
            [
                'category_id' => '1',
                'product_name' => 'Áo thun 4',
                'product_size' => 'S,M,L',
                'product_color' => 'trắng,đen',
                'product_slug' => 'ao-thun-4',
                'product_quantity' => '1000',
                'selling_price' => '235000',
                'discount_price' => '10000',
                'description' => 'Áo thun tay ngắn 4',
                'status' => 'inactive',
            ],
            [
                'category_id' => '1',
                'product_name' => 'Áo thun 5',
                'product_size' => 'S,M,L',
                'product_color' => 'trắng,đen',
                'product_slug' => 'ao-thun-5',
                'product_quantity' => '1000',
                'selling_price' => '235000',
                'discount_price' => '10000',
                'description' => 'Áo thun tay ngắn 5',
                'status' => 'inactive',
            ]
        ]);
    }
}
