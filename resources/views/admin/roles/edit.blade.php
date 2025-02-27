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

    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop