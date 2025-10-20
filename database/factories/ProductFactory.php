<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
           'name' => $this->faker->words(2, true),
           'price' => $this->faker->numberBetween(10000, 500000),
           'category_id' => Category::factory(),
           'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
