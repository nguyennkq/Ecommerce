<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'logo' => 'https://picsum.photos/200',
                'support_phone' => '0364249976',
                'email' => 'abc@gmail.com',
                'address' => 'Hà Nội',
                'copyright' => 'copyright1',
            ], [
                'logo' => 'https://picsum.photos/200',
                'support_phone' => '0364249975',
                'email' => 'abc2@gmail.com',
                'address' => 'Hà Nội2',
                'copyright' => 'copyright2',
            ], [
                'logo' => 'https://picsum.photos/200',
                'support_phone' => '0364249974',
                'email' => 'abc3@gmail.com',
                'address' => 'Hà Nội3',
                'copyright' => 'copyright3',
            ], [
                'logo' => 'https://picsum.photos/200',
                'support_phone' => '0364249973',
                'email' => 'abc4@gmail.com',
                'address' => 'Hà Nội3',
                'copyright' => 'copyright4',
            ],
            [
                'logo' => 'https://picsum.photos/200',
                'support_phone' => '0364249972',
                'email' => 'abc5@gmail.com',
                'address' => 'Hà Nội5',
                'copyright' => 'copyright5',
            ]
        ]);
    }
}
