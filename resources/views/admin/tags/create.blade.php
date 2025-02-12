@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Crear tag</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.tags.store')}}" method="POST">
            @csrf

            {{-- nombre --}}
            <div class="form-group">
                <label for="name">
                    Nombre
                </label>

                <input name="name" type="text" class="form-control" id="name" placeholder="Nombre de la etiqueta">
                
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

            <div class="form-group">
                <label for="color">Color</label>

                <select name="color" id="color" class="form-control">
                    <option value="red">Rojo</option>
                    <option value="yellow">Amarillo</option>
                    <option value="green">Verde</option>
                    <option value="blue">Azul</option>
                    <option value="indigo">Indigo</option>
                    <option value="purple">Morado</option>
                    <option value="pink">Rosado</option>
                </select>

                @error('color')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <input type="submit" value="Crear etiqueta" class="btn btn-primary">
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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

            let fraseQuitarAsentos = removeAccents(e.target.value)

            slug.value = slugify(fraseQuitarAsentos);
        })
    }
    
    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
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