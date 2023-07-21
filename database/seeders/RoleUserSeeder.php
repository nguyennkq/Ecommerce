<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_users')->insert([
            'role_id'=>'3',
            'user_id'=>'1',
        ]);
        DB::table('role_users')->insert([
            'role_id'=>'4',
            'user_id'=>'2',
        ]);
        DB::table('role_users')->insert([
            'role_id'=>'5',
            'user_id'=>'3',
        ]);
        DB::table('role_users')->insert([
            'role_id'=>'1',
            'user_id'=>'4',
        ]);
        DB::table('role_users')->insert([
            'role_id'=>'2',
            'user_id'=>'5',
        ]);
    }
}
