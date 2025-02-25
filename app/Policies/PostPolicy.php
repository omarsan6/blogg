<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    // si el usuario logeado es el mismo que el usuario del post, puede editar
    public function author(User $user, Post $post){
        return $user->id === $post->user_id;
    }

    // si el post esta con el status 2 o publicado mostrar en el sistema sino. regresar "Contenido no disponible"
    public function published(?User $user, Post $post){
        return $post->status == 2;
    }
}
