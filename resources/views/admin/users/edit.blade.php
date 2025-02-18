@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

@if (session("correcto"))
<div class="alert alert-success" role="alert">
    {{session("correcto")}}
</div>
@endif

    <div class="card">
        <div class="card-body">
            <p class="h5 mb-3">Nombre: <span class="h6">{{$user->name}}</span></p>
           
            <h2 class="h5">Listado de roles</h2>

            <form action="{{route('admin.users.update',$user)}}" method="POST">
                @csrf
                @method('PUT')

                @foreach ($roles as $role)
                    <div class="">
                        <label>
                            <input class="mr-1" type="checkbox" name="roles[]" value="{{$role->id}}"
                            {{in_array($role->id,$userRoles) ? 'checked' : ''}}
                            >
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                <input type="submit" value="Asignar rol" class="btn btn-primary mt-2">

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