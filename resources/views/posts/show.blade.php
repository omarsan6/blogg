<x-app-layout>
    <div class="containeer">
        <h1 class="text-4xl font-bold text-gray-600 my-5">{{$post->name}}</h1>

        <div class="text-lg text-gray-500 my-2">
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/05/03/23/12/animal-7172825_1280.png" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>

            </div>

            {{-- Contenidos relacionados --}}
            <aside>

                <h2 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->category->name}}</h2>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show',$similar)}}">

                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/05/03/23/12/animal-7172825_1280.png" alt="">
                                @endif
                                
                                <span class="text-gray-600 text-sm ml-2">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </aside>
        </div>

    </div>
</x-app-layout>