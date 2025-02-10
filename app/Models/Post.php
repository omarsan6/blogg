<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    // Slug en el id
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
