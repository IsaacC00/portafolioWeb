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

    protected $model=Image::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $imageContent = file_get_contents($faker->imageUrl(400, 300));
        $imageName = 'public/' . uniqid() . '.jpg';

        Storage::put($imageName, $imageContent);

        return [
            'image_path' => $imageName,
        ];
    }

}
