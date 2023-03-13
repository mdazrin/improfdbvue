<?php

namespace Database\Factories;

use App\Models\Core;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Core>
 */
class CoreFactory extends Factory
{
    protected $model = Core::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $incrementing_number = 1;
        return [
            'user_id'=>$incrementing_number++,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'ppi' => fake()->numberBetween([1],[100]),
            'batch' => fake()->firstName(),

        ];
    }
}
