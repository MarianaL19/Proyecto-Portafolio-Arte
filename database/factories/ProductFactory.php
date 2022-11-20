<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(10, 100),
            'info' => $this->faker->sentence(5),
            'author' => $this->faker->name(),
            'technique' => $this->faker->word(),
            'format' => $this->faker->word(),
            'img' => $this->faker->word(),
        ];
    }
}
