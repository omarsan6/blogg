@extends('adminlte::page')

@section('title', 'LunaDev')

@section('content_header')
    <h1>Nuevo Post</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{route('admin.posts.store')}}" method="POST">

                @csrf

                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                {{-- nombre --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control" 
                        placeholder="Nombre del post">

                    @error('name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- slug --}}
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input 
                        type="text"
                        name="slug"
                        id="slug"
                        class="form-control"
                        readonly>

                    @error('slug')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- categorias --}}
                <div class="form-group">
                    <label for="category_id">Categorías</label>
    
                    <select name="category_id" id="category_id" class="form-control">

                        @foreach ($categories as $category)  
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                       
                    </select>
    
                    @error('category_id')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- estado --}}
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label class="mr-2">
                        <input class="" type="radio" name="status" id="status" value="1" checked>
                        <span class="font-weight-normal">Borrador</span>
                    </label>
                    <label>
                        <input class="" type="radio" name="status" id="status" value="2">
                        <span class="font-weight-normal">Publicado</span>
                    </label>

                    @error('status')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- tags --}}
                <div id="accordion">

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <button type="button" class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <strong>Etiquetas</strong>
                              <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                              </svg>
                              
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">
                            <div class="form-group">
                                @foreach ($tags as $tag)
            
                                <label class="mr-5">
                                    <input class="" name="tags[]" type="checkbox" value="{{$tag->id}}">
                                    <span class="font-weight-normal">#{{$tag->name}}</span>
                                </label>
                                @endforeach

                                @error('tags')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                {{-- extract --}}
                <div class="form-group">
                    <label for="extract">Extracto del post</label>
                    <textarea name="extract" class="form-control" id="extract" cols="10" rows="10"></textarea>

                    @error('extract')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                {{-- body --}}
                <div class="form-group">
                    <label for="body">Cuerpo del post</label>
                    <textarea name="body" class="form-control" id="body" cols="10" rows="10"></textarea>

                    @error('body')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Crear post">


            </form>

        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css">
@stop

@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () =>{

            valor()

        })

        const valor = () =>{
            const name = document.getElementById("name");
            const slug = document.getElementById("slug");
        
            name.addEventListener('input', e =>{

                let fraseQuitarAsentos = removeAccents(e.target.value)

                slug.value = slugify(fraseQuitarAsentos);
            })
        }
        
        const removeAccents = (str) => {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        } 

        function slugify(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim leading/trailing white space
            str = str.toLowerCase(); // convert string to lowercase
            str = str.replace(/[^a-z0-9 -]/g, '') // remove any non-alphanumeric characters
                    .replace(/\s+/g, '-') // replace spaces with hyphens
                    .replace(/-+/g, '-'); // remove consecutive hyphens
            return str;
        }

        
    </script>

    <script>
        const {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } = CKEDITOR;
        // Create a free account and get <YOUR_LICENSE_KEY>
        // https://portal.ckeditor.com/checkout?plan=free
        ClassicEditor
            .create( document.querySelector( '#extract' ), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzA0MjIzOTksImp0aSI6ImViZWNlYWRlLWE1YWYtNGY2MC05YzdjLTczMjVkMTVjYjllZCIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiZTNkOTk1MGMifQ.WqoBgHR6R5KoV1tSIbLEzNYmglEikMnGmwn7IERw59d8xZH-xBvcqfnNKuXFGv3MiaNzVFP4GI9WKgQblwD7ug',
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#body' ), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzA0MjIzOTksImp0aSI6ImViZWNlYWRlLWE1YWYtNGY2MC05YzdjLTczMjVkMTVjYjllZCIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiZTNkOTk1MGMifQ.WqoBgHR6R5KoV1tSIbLEzNYmglEikMnGmwn7IERw59d8xZH-xBvcqfnNKuXFGv3MiaNzVFP4GI9WKgQblwD7ug',
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop