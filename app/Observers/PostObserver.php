<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleting(Post $post): void
    {
        // Recorrer y eliminar todas las imágenes asociadas al post
        foreach ($post->images as $image) {
            
            if (File::exists($image->image_path)) {
                File::delete($image->image_path);
            }
            // Eliminar el registro de la imagen
            $image->delete();
        }
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
