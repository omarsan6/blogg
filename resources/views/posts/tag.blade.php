<x-app-layout>

    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-2xl font-bold pb-4">Etiqueta:
            <span class="text-indigo-800 text-4xl">
                {{$tag->name}}
            </span> 
        </h1>

        <div class="grid md:grid-cols-2">

            @foreach ($posts as $post)
    
                <x-card-post :post="$post" />
                
            @endforeach
        </div>


        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>