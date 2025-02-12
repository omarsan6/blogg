<?php

namespace App\Livewire\Admin;

use App\Models\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PostsIndex extends Component
{

    // paginacion
    use WithPagination;

    // cambiar los estilos de paginacion en vez de tailwind a bootstrap
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $posts = Post::where('user_id', Auth::id())
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.posts-index',compact('posts'));
    }
}
