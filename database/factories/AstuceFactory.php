<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Astuce>
 */
class AstuceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ["educative", "pedagogique", "professionelle"];
        return [
            'titre' => fake()->sentence(),
            'contenu' => fake()->sentences(3, true),
            'type' => Arr::random($type)
        ];
    }
}
