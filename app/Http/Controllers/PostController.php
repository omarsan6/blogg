<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){

        // si por la url está pasando info de la pagina
        if(request()->page){
            $key = 'posts'.request()->page; // return posts1,posts2,posts3
        }else{
            $key = 'posts';
        }

        // valida si existe una variable posts en cache
        if(Cache::has($key)){
            // si existe devuelve el valor
            $posts = Cache::get($key);
        } else{
            //si n existe hace la peticion a la base de datos
            $posts = Post::where('status',2)->latest('id')->paginate(8);
            // almacenar en cache
            Cache::put($key,$posts);
        }

        return view('posts.index',compact('posts'));

    }

    public function show(Post $post){

        if (!Gate::allows('published', $post)) {
            abort(403,"No tiene acceso");
        }

        $similares = Post::where('category_id', $post->category_id)
                                ->where('status',2)
                                ->where('id', '!=', $post->id)
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post','similares'));
    }

    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                            ->where('status',2)
                            ->latest('id')
                            ->paginate(6);

        return view('posts.category',compact('posts','category'));

    }

    public function tag(Tag $tag){

        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);

        return view('posts.tag', compact('posts','tag'));
    }
}
