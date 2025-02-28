@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')

    <div class="d-flex w-100">
        <h1 class="mr-3">Roles</h1>
        <a href="{{route('admin.roles.create')}}" class="btn btn-success">Nuevo</a>
    </div>
@stop

@section('content')

@if (session("correcto"))
<div class="alert alert-success" role="alert">
    {{session("correcto")}}
</div>
@endif
    
    <div class="card">
        <div class="card-body">
            <table class="table tabel-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <t-body>

                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-sm btn-primary" href="{{route('admin.roles.edit',$role)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </t-body>
            </table>
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