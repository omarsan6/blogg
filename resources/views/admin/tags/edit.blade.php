@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
@if (session("correcto"))
<div class="alert alert-success" role="alert">
    {{session("correcto")}}
</div>
@endif

<div class="card">
<div class="card-body">
    <form action="{{route('admin.tags.update',$tag)}}" method="POST">
        @csrf
        @method('PUT')

        {{-- nombre --}}
        <div class="form-group">
            <label for="name">
                Nombre
            </label>

            <input name="name" type="text" value="{{$tag->name}}" class="form-control" id="name" placeholder="Nombre la categoria">

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

            <input name="slug" value="{{$tag->slug}}" type="text" class="form-control" id="slug" readonly>

            @error('slug')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

        {{-- colors --}}
        <div class="form-group">
            <label for="color">Color</label>

            <select name="color" id="color" class="form-control">
                <option value="red" {{$tag->color == 'red' ? 'selected' : ''}}>Rojo</option>
                <option value="yellow" {{$tag->color == 'yellow' ? 'selected' : ''}}>Amarillo</option>
                <option value="green" {{$tag->color == 'green' ? 'selected' : ''}}>Verde</option>
                <option value="blue" {{$tag->color == 'blue' ? 'selected' : ''}}>Azul</option>
                <option value="indigo" {{$tag->color == 'indigo' ? 'selected' : ''}}>Indigo</option>
                <option value="purple" {{$tag->color == 'purple' ? 'selected' : ''}}>Morado</option>
                <option value="pink" {{$tag->color == 'pink' ? 'selected' : ''}}>Rosado</option>
            </select>

            @error('color')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

        <input type="submit" value="Editar etiqueta" class="btn btn-primary">
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