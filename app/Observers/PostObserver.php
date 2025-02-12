<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        if(!app()->runningInConsole()){
            $post->user_id = Auth::id();
        }
    }


    /**
     * Handle the Post "deleted" event.
     */
    public function deleting(Post $post): void
    {
        if($post->image){

            // eliminar los registros de la imagen en la tabla Image
            $image = $post->image;
            $image->delete();

            // eliminar las imagenes de la carpeta Storage/public/posts
            Storage::delete($post->image->url);
        }
    }
}
