@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.roles.store')}}">
            
                {{-- name --}}
                <div class="form-group">
                    <label for="name">
                        Nombre
                    </label>

                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control"
                        placeholder="Ej: Administrador">

                </div>

                <h2 class="h3">
                    Listado de permisos
                </h2>

                @foreach ($permissions as $permission)
                <div class="">
                    <label>
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" class="mr-1">
                        {{$permission->description}}
                    </label>
                </div>
                @endforeach
                
                <input class="btn btn-primary" type="submit" value="Crear rol">
            </form>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop