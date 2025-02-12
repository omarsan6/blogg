@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <div class="d-flex w-100">

        <h1 class="mr-3">Posts</h1>
    
        <a class="btn btn-success" href="{{route('admin.posts.create')}}">Nuevo</a>
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

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop