<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'testimonio' => $this->faker->paragraph, // Genera un párrafo aleatorio
            'nombre_testimonio' => $this->faker->name, // Genera un nombre de persona aleatorio
            'cargo_testimonio' => $this->faker->jobTitle, //
            'user_id'=>1,
        ];
    }
}
