@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
<h1>Crear nueva categoría</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('admin.categories.store')}}" method="POST" class="">
            @csrf

            {{-- nombre --}}
            <div class="form-group">
                <label for="name">
                    Nombre
                </label>

                <input name="name" type="text" class="form-control" id="name" placeholder="Nombre la categoria">
                
                @error('name')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror

            </div>

            {{-- slug --}}
            <div class="form-group">
                <label for="slug">
                    Slug
                </label>

                <input name="slug" type="text" class="form-control" id="slug" readonly>

                @error('slug')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- <div class="mb-5">
                <label for="name" class="">
                    Nombre
                </label>

                <input id="name" type="text" name="name" placeholder="Nombre de categoría" class="
                        @error('name')
                            border-red-500
                        @enderror">

                @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                    {{ $message }}
                </p>
                @enderror
            </div> --}}

            <input type="submit" value="Crear categoría" class="btn btn-primary">
        </form>
    </div>
</div>

@stop

@section('js')


<script>
    document.addEventListener("DOMContentLoaded", () =>{

        valor()

    })

    const valor = () =>{
        const name = document.getElementById("name");
        const slug = document.getElementById("slug");
    
        name.addEventListener('input', e =>{
            slug.value = slugify(e.target.value);
        })
    }

    function slugify(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim leading/trailing white space
        str = str.toLowerCase(); // convert string to lowercase
        str = str.replace(/[^a-z0-9 -]/g, '') // remove any non-alphanumeric characters
                .replace(/\s+/g, '-') // replace spaces with hyphens
                .replace(/-+/g, '-'); // remove consecutive hyphens
        return str;
    }
    
    </script>

@stop