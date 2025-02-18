@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <div class="d-flex w-100">
        <h1 class="mr-3">Categorías</h1>

        @can('admin.categories.create')
            <a href="{{route('admin.categories.create')}}" class="btn btn-success">Nuevo</a>
        @endcan

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
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    @can('admin.categories.create')
                        <th colspan="2">Acciones</th>
                    @endcan
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                    
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">

                                @can('admin.categories.edit')  
                                    <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan

                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>
                                @endcan
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

