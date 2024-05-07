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
            'tipo_certificado' => $this->faker->word, // Genera una palabra aleatoria
            'inst_certificado' => $this->faker->company, // Genera un nombre de compañía aleatorio
            'desc_certificado' => $this->faker->sentence, // Genera una oración aleatoria
            'fecha_certificado' => $this->faker->date(), // Genera una fecha aleatoria
            'user_id'=>1,
        ];
        
    }
}
