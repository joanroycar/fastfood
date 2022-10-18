<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Category::factory(5)->create();
        Product::factory(10)->create();
        Customer::factory(5)->create();

        Order::factory(5)->create()->each(function($order){
              $order->details()->create(
                [
                 'order_id'=>$order->id,
                 'product_id'=> Product::all()->random()->id,
                 'quantity' =>$order->items,
                 'price'=>$order->total / $order->items

                ]
                );

        });
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
