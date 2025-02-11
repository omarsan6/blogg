<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        // crea un nuevo post
        $post = Post::create($request->all());

        // Si se está enviando una imagen desde el formulario
        if($request->file('file')){
            // mover el archivo de la carpeta temporal a la carperta storage/app/public/posts
           $url = Storage::put('posts',$request->file('file'));

            // al subir la url de la imagen a traves de relaciones el campo imagebale_id e
            // imageable_type son llenados por el id del $post y el modelo automaticamente
           $post->image()->create([
                'url' => $url,
           ]);
        }

        // almacenar los tags en la tabla muchos a muchos
        // si tiene tags en el objeto request, almacenarlos
        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
