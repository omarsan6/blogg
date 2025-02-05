<?php

namespace App\Livewire\Admin;

use App\Models\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class PostsIndex extends Component
{
    public function render()
    {

        $posts = Post::where('user_id', Auth::id())->paginate();

        return view('livewire.admin.posts-index',compact('posts'));
    }
}
