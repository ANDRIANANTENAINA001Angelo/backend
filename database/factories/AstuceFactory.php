<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

$faker = FakerFactory::create('fr_FR'); // Définit la localisation en français

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
        return [
            'label' => fake()->sentences(3, true)
        ];
    }
}
