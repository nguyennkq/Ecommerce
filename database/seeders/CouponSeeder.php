<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert(
            [
                [
                    'name' => 'nguyennk',
                    'discount' => 20,
                    'start_date' => '2023/07/22',
                    'end_date' => '2023/09/30',
                    'type' => 'fixed',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'nguyennk01',
                    'discount' => 205,
                    'start_date' => '2023/07/22',
                    'end_date' => '2023/09/30',
                    'type' => 'fixed',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'nguyennk02',
                    'discount' => 201,
                    'start_date' => '2023/07/22',
                    'end_date' => '2023/09/30',
                    'type' => 'fixed',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'nguyennk04',
                    'discount' => 20,
                    'start_date' => '2023/07/22',
                    'end_date' => '2023/09/30',
                    'type' => 'fixed',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'nguyennk05',
                    'discount' => 20,
                    'start_date' => '2023/07/22',
                    'end_date' => '2023/09/30',
                    'type' => 'fixed',
                    'status' => 'inactive',
                ],
            ]
        );
    }
}
