@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

@if (session("correcto"))
<div class="alert alert-success" role="alert">
    {{session("correcto")}}
</div>
@endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.roles.update',$role)}}" method="POST">
                @method('PUT')
                @csrf
            
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
                        placeholder="Ej: Administrador"
                        value="{{$role->name}}">

                    @error('name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <h2 class="h3">
                    Listado de permisos
                </h2>

                @foreach ($permissions as $permission)
                <div class="">
                    <label>
                        <input 
                            type="checkbox" 
                            name="permissions[]" 
                            value="{{$permission->id}}" 
                            class="mr-1"
                            {{in_array($permission->id,$rolesPermission) ? 'checked' : ''}}
                            >
                        {{$permission->description}}
                    </label>
                </div>
                @endforeach
                
                <input class="btn btn-primary" type="submit" value="Editar rol">
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