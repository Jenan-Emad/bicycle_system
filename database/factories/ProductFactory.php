<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => ucfirst($this->faker->words(3, true)),
            'img_url'     => $this->faker->imageUrl(640, 480, 'products', true),
            'description' => $this->faker->paragraph(),
            'stock'       => $this->faker->numberBetween(10, 100),
            'sold_stock'  => $this->faker->numberBetween(0, 50),
            'sku' => $this->faker->unique()->bothify('SKU-####'),
            'tags' => $this->faker->randomElements(['road', 'mountain', 'electric', 'bike', 'accessory'], rand(1, 3)),
            'price' => $this->faker->numberBetween(500, 5000),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'brand_id'    => Brand::inRandomOrder()->first()?->id,
        ];
    }
}