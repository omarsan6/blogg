<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relacion uno a muchos
    public function post(){
        return $this->hasMany(Post::class);
    }
}
