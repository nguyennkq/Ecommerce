<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'banner_title' => 'Welcome to Website',
                'banner_url' => 'https://picsum.photos/200',
            ],
            [
                'banner_title' => 'Welcome to Website 2',
                'banner_url' => 'https://picsum.photos/200',
            ],
            [
                'banner_title' => 'Welcome to Website 3',
                'banner_url' => 'https://picsum.photos/200',
            ],
            [
                'banner_title' => 'Welcome to Website 4',
                'banner_url' => 'https://picsum.photos/200',
            ],
            [
                'banner_title' => 'Welcome to Website 5',
                'banner_url' => 'https://picsum.photos/200',
            ]
        ]);
    }
}
