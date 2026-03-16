<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $name = $this->faker->unique()->sentence(3);
        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->numberBetween(5000, 500000),
            'stock' => $this->faker->numberBetween(0, 100),
            'images' => [],
            'is_active' => true,
        ];
    }
}
