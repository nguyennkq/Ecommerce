<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = $this->faker->unique()->text(20);
        $slug = Str::slug(Str::lower($category_name));
        return [
            'category_name' => $category_name,
            'category_slug' => $slug,
            'category_image' => $this->faker->image(storage_path('app/public/images/category'), 200, 200, null, false),
        ];
    }
}
