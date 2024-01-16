<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Staff;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::truncate();
        Product::truncate();
        User::truncate();
        Order::truncate();
        OrderItem::truncate();

        Staff::truncate();

        Category::factory(10)
            ->has(Product::factory(10))->create();

        User::factory(5)
            ->has(Order::factory(5)
                ->hasOrderItems(5))->create();

        $users = User::all();
        foreach ($users as $user){
            CartItem::factory(3)->for($user)->create();
        }

        Staff::factory(5);

    }
}
