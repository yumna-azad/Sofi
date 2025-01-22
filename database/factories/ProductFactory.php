<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'category_id' => Category::factory(),
            'image' => 'products/' . fake()->image('public/storage/products', 640, 480, null, false),
            'stock' => fake()->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}