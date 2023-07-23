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
                    'name' => 'name1',
                    'group_name' => 'group_name_1',
                ],
                [
                    'name' => 'name2',
                    'group_name' => 'group_name_2',
                ],
                [
                    'name' => 'name3',
                    'group_name' => 'group_name_3',
                ],
                [
                    'name' => 'name4',
                    'group_name' => 'group_name_4',
                ],
                [
                    'name' => 'name5',
                    'group_name' => 'group_name_5',
                ]
            ]
        );
    }
}
