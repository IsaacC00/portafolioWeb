<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Image;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Image::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $imageContent = file_get_contents($faker->imageUrl(1000, 1000));
        $imageName = 'projects/' . uniqid() . '.jpg';

        // Asegúrate de que la carpeta `projects` exista o créala
        $directory = public_path('projects');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Utiliza file_put_contents para guardar el archivo en la carpeta public
        file_put_contents(public_path($imageName), $imageContent);
        
        return [
            'image_path' => $imageName,
        ];
    }
}
