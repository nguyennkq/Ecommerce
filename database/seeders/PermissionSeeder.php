<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert(
            [
                [
                    'name' => 'Add Product',
                    'group_name' => 'Product',
                ],
                [
                    'name' => 'Add Category',
                    'group_name' => 'Category',
                ],
                [
                    'name' => 'Add Banner',
                    'group_name' => 'Banner',
                ],
                [
                    'name' => 'Add Coupon',
                    'group_name' => 'Coupon',
                ],
                [
                    'name' => 'Edit Product',
                    'group_name' => 'Product',
                ]
            ]
        );
    }
}
