<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\FAQ;
use App\Models\NewsSubscriber;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProSay;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::transaction(function () {

            /* =======================
             * USERS
             * ======================= */
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]);

            $users = User::factory(10)->create();

            /* =======================
             * CATEGORIES
             * ======================= */
            $categories = Category::insert([
                ['name' => 'Bikes'],
                ['name' => 'Accessories'],
                ['name' => 'Clothing'],
            ]);

            /* =======================
             * BRANDS
             * ======================= */
            Brand::insert([
                ['name' => 'Trek'],
                ['name' => 'Giant'],
                ['name' => 'Specialized'],
            ]);

            /* =======================
             * PRODUCTS
             * ======================= */
            $categories = Category::all();
            $brands = Brand::all();

            foreach ($categories as $category) {
                // create, for example, 5 products per category
                Product::factory(5)->create([
                    'category_id' => $category->id,
                    'brand_id'    => $brands->random()->id, // pick random brand
                ]);
            }

            /* =======================
             * DISCOUNTS
             * ======================= */
            $discount = Discount::create([
                'percentage' => 20,
                'start_date' => now(),
                'end_date'   => now()->addDays(7),
            ]);

            $discount->products()->attach(
                Product::inRandomOrder()->take(6)->pluck('id')
            );

            /* =======================
             * ORDERS + BEST SELLING
             * ======================= */
            User::all()->each(function ($user) {

                if (rand(0, 1) === 0) return;

                $order = Order::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                ]);

                $products = Product::inRandomOrder()->take(rand(1, 4))->get();
                $total = 0;

                foreach ($products as $product) {
                    $qty = rand(1, 3);
                    $price = rand(50, 300);

                    $order->products()->attach($product->id, [
                        'quantity' => $qty,
                        'price' => $price,
                    ]);

                    // sync sold stock
                    $product->increment('sold_stock', $qty);

                    $total += $qty * $price;
                }

                $order->update(['total_price' => $total]);
            });

            /* =======================
             * BLOGS
             * ======================= */
            Blog::factory(10)->create([
                'user_id' => User::inRandomOrder()->first()->id,
            ]);

            /* =======================
             * FAQ
             * ======================= */
            FAQ::factory(15)->create();

            /* =======================
             * CONTACTS
             * ======================= */
            Contact::factory(10)->create();

            /* =======================
             * NEWS SUBSCRIBERS
             * ======================= */
            NewsSubscriber::factory(20)->create();

            /* =======================
             * SERVICES
             * ======================= */
            $services = Service::factory(5)->create();

            User::all()->each(function ($user) use ($services) {
                $user->services()->attach(
                    $services->random(rand(1, 2))->pluck('id')
                );
            });

            /* =======================
             * PRO SAYS
             * ======================= */
            ProSay::factory(5)->create();
        });
    }
}