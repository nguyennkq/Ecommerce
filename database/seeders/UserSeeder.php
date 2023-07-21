<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Name1',
                    'username' => 'Nam Định',
                    'email' => 'khnc234@gmail.com',
                    'password' => '123',
                    'role' => 'admin',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'Name2',
                    'username' => 'Nam Định1',
                    'email' => 'khnc231@gmail.com',
                    'password' => '123',
                    'role' => 'admin',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'Name1',
                    'username' => 'Nam Định2',
                    'email' => 'khnc235@gmail.com',
                    'password' => '123',
                    'role' => 'admin',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'Name1',
                    'username' => 'Nam Định3',
                    'email' => 'khnc236@gmail.com',
                    'password' => '123',
                    'role' => 'user',
                    'status' => 'inactive',
                ],
                [
                    'name' => 'Name1',
                    'username' => 'Nam Định4',
                    'email' => 'khnc273@gmail.com',
                    'password' => '123',
                    'role' => 'admin',
                    'status' => 'inactive',
                ],
            ]
        );
    }
}
