<x-app-layout>


    <div class="mt-10 p-7 md:mt-5 md:p-20  bg-white">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center 
                    @if ($loop->first)
                        md:col-span-2
                    @endif" style="background-image: url(
                        @if($post->image)
                            {{Storage::url($post->image->url)}}
                        @else 
                            https://cdn.pixabay.com/photo/2022/05/03/23/12/animal-7172825_1280.png
                        @endif)"
                >
                    
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div class="mb-2">
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-black text-white rounded-full">
                                    #{{$tag->name}}
                                </a>
                            @endforeach
                        </div>

                        <h2 class="text-4xl text-white leading-8 font-bold">
                            <a class="hover:underline" href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h2>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>