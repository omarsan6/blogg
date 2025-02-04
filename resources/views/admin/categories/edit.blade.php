@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
<h1>Editar categoría</h1>
@stop

@section('content')

@if (session("correcto"))
    <div class="alert alert-success" role="alert">
        {{session("correcto")}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{route('admin.categories.update',$category)}}" method="POST" class="">
            @csrf
            @method('PUT')

            {{-- nombre --}}
            <div class="form-group">
                <label for="name">
                    Nombre
                </label>

                <input name="name" type="text" value="{{$category->name}}" class="form-control" id="name" placeholder="Nombre la categoria">

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

                <input name="slug" value="{{$category->slug}}" type="text" class="form-control" id="slug" readonly>

                @error('slug')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <input type="submit" value="Editar categoría" class="btn btn-primary">
        </form>
    </div>
</div>

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
    })}

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