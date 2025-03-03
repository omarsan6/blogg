<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// solo los que tengan el role de admin puedan acceder a estas rutas
Route::middleware(['role:Admin'])->group(function(){
        Route::resource('users', UserController::class)
                ->only(['index','edit','update']) //crea solo las rutas index, edit y update
                ->names('admin.users');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {

        Route::resource('roles',RoleController::class)->names('admin.roles');

});


/* CATEGORY */
Route::middleware(['auth'])->group(function () {
        // crea la ruta para index y que los usuarios con rol de Blogger y Admin puedan acceder
        Route::resource('categories', CategoryController::class)
                ->except(['create', 'store', 'edit', 'update', 'destroy','show']) //crea solo index
                ->middleware('can:admin.categories')
                ->names('admin.categories');
});    

Route::middleware(['auth', 'role:Admin'])->group(function () {
        // hace que solo los que tengan rol de Admin puedan acceder
        Route::resource('categories', CategoryController::class)
                ->only(['create','store','edit','update','destroy']) //crea todos menos show e index
                ->names('admin.categories');
});   

/* TAGS */
// los usuarios autenticados sin importar el rol pueden ver la ruta index generada
Route::middleware(['auth'])->group(function (){
        Route::resource('tags', TagController::class)
                ->except(['create', 'store', 'edit', 'update', 'destroy','show']) //genera solo index
                ->middleware('can:admin.tags')
                ->names('admin.tags');
});

//los usuarios con rol de Admin pueden acceder a estas rutas
Route::middleware(['auth','role:Admin'])->group(function (){
        Route::resource('tags', TagController::class)
                ->only(['create','store','edit','update','destroy']) //crea todos menos show e index
                ->names('admin.tags');
});


Route::resource('posts', PostController::class)
        ->names('admin.posts');

        
