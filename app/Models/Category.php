<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relacion uno a muchos
    public function post(){
        return $this->hasMany(Post::class);
    }
}
