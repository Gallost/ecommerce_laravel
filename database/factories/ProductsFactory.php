<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>  fake()->sentence(2),
            'description' => fake()->sentence(10),
            'price' => fake()->randomFloat(2, 10, 100),
            'category' => fake()->randomElement(['Electronics', 'Clothing', 'Books', 'Home', 'Garden', 'Food']),
            'image_url' => 'https://icon-library.com/images/placeholder-image-icon/placeholder-image-icon-17.jpg'
        ];
    }
}
