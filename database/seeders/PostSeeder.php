<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(100)->create();
        foreach ($posts as $post) {
            // crea una imagen por cada post
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);

            // agrega un id de un tag, en este caso agrega dos tags por post, y el post_id 
            // lo obtiene a traves del $post
            $post->tags()->attach([
                rand(1,4),
                rand(5,8),
            ]);
        }
    }
}
