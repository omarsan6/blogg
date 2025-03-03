@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <div class="d-flex w-100">

        <h1 class="mr-3">Posts</h1>
    
        @can('admin.posts.create')   
            <a class="btn btn-success" href="{{route('admin.posts.create')}}">Nuevo</a>
        @endcan
    </div>
@stop

@section('content')

    @if (session("correcto"))
    <div class="alert alert-success" role="alert">
        {{session("correcto")}}
    </div>
    @endif
    
    @livewire('admin.posts-index')

@stop
