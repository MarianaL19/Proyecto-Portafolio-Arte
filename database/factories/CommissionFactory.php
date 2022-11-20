<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Commission;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commission>
 */
class CommissionFactory extends Factory
{
    protected $model = Commission::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->words(3, true),
            'type' => $this->faker->words(2, true),
            'info' => $this->faker->sentence(5),
            'tip' => $this->faker->numberBetween(0, 50),
            'price' => $this->faker->numberBetween(10, 100),
            'commercial' => $this->faker->numberBetween(0, 1),
        ];
    }
}
