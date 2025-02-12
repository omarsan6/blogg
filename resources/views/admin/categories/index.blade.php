@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')

    @if (session("correcto"))
    <div class="alert alert-success" role="alert">
        {{session("correcto")}}
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.categories.create')}}" class="btn btn-success">Nuevo</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2">Acciones</th>
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                    
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

