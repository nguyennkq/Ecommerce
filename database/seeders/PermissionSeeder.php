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
        DB::table('permissions')->insert([
            'name'=>'name1',
            'group_name'=> 'group_name_1',
        ]);
        DB::table('permissions')->insert([
            'name'=>'name2',
            'group_name'=> 'group_name_2',
        ]);
        DB::table('permissions')->insert([
            'name'=>'name3',
            'group_name'=> 'group_name_3',
        ]);
        DB::table('permissions')->insert([
            'name'=>'name4',
            'group_name'=> 'group_name_4',
        ]);
        DB::table('permissions')->insert([
            'name'=>'name5',
            'group_name'=> 'group_name_5',
        ]);
    }
}
