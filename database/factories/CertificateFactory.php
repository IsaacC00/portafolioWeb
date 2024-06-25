<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
       
        return [
            'nombre_servicio' => $this->faker->company, // Genera un nombre de compañía aleatorio
            'desc_servicio' => $this->faker->sentence, // Genera una oración aleatoria
            'user_id'=>1,
        ];
        
    }
}
