<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(5)->create();
        DB::table('categories')->insert([
            [
                'category_name' => 'Sét nam',
                'category_slug' => 'set-nam',
            ],
            [
                'category_name' => 'Sét nữ',
                'category_slug' => 'set-nu',
            ],
            [
                'category_name' => 'Sét nam nữ',
                'category_slug' => 'set-nam-nu',
            ],
            [
                'category_name' => 'Áo sơ mi',
                'category_slug' => 'ao-so-mi',
            ],
            [
                'category_name' => 'Quần jean',
                'category_slug' => 'quan-jean',
            ]
        ]);
    }
}
