<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }


    /**
     * Handle the Post "deleted" event.
     */
    public function deleting(Post $post): void
    {
        if($post->image){
            Storage::delete($post->image->url);
        }
    }
}
