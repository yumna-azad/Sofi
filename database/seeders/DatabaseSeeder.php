<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        // Create regular users
        User::factory(10)->create();

        // Create categories with products
        Category::factory(5)
            ->has(Product::factory()->count(4))
            ->create();

        // Create orders with reviews
        Order::factory(20)->create()->each(function ($order) {
            Review::factory()->count(2)->create([
                'user_id' => $order->user_id,
                'product_id' => Product::inRandomOrder()->first()->id,
            ]);
        });
    }
}
