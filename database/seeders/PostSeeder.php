<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $posts=Post::factory(30)->create()->each(function ($post) {
            // Para cada post, crear entre 1 y 5 imágenes
            Image::factory(rand(5, 10))->create(['post_id' => $post->id]);
        });

    }
}
