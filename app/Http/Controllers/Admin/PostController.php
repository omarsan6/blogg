<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;

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
    public function store(PostRequest $request)
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

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        // Edita los atributos posts
        $post->update($request->all());

        // si existe una imagen dentro del post
        if($request->file('file')){

            // guardar la url de la imagen nueva
            $url = Storage::put('posts',$request->file('file'));

            // si el post tenia una imagen asociada
            if($post->image){
                // eliminar la imagen antigua
                Storage::delete($post->image->url);
                // actualizar la imagen nueva
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                // si no hay imagen asociada, crear un registro para la nueva imagen
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

         // almacenar los tags en la tabla muchos a muchos
        // si tiene tags en el objeto request, almacenarlos
        if($request->tags){
            
            // si los tags que se pasan por el objeto request no estan en la base de datos, los agrega
            // en caso de que habia otros tags, pero no aparecen en el nuevo request, los elimina
            $post->tags()->sync($request->tags);

        }

        return redirect()->route('admin.posts.edit',$post)->with('correcto','El post se actualizó con éxito :)');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('correcto','El post se eliminó con éxito :(');

    }
}
