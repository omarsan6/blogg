<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

/*
        Categoria
 */
// Listar todas las categorías
Route::get('/categories', [CategoryController::class, 'index'])
        ->middleware('can:admin.categories.index')
        ->name('admin.categories.index');

// Mostrar formulario de creación
Route::get('/categories/create', [CategoryController::class, 'create'])
        ->middleware('can:admin.categories.create')
        ->name('admin.categories.create');

// Guardar nueva categoría
Route::post('/categories', [CategoryController::class, 'store'])
        ->name('admin.categories.store');

// Mostrar formulario de edición
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->middleware('can:admin.categories.edit')
        ->name('admin.categories.edit');

// Actualizar categoría
Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('admin.categories.update');

// Eliminar categoría
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->middleware('can:admin.categories.destroy')
        ->name('admin.categories.destroy');


/*
        TAGS
 */
Route::get('/tags', [TagController::class, 'index'])
        ->middleware('can:admin.tags.index')
        ->name('admin.tags.index');

// Mostrar formulario de creación
Route::get('/tags/create', [TagController::class, 'create'])
        ->middleware('can:admin.tags.create')
        ->name('admin.tags.create');

// Guardar nueva categoría
Route::post('/tags', [TagController::class, 'store'])
        ->name('admin.tags.store');

// Mostrar formulario de edición
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])
        ->middleware('can:admin.tags.edit')
        ->name('admin.tags.edit');

// Actualizar categoría
Route::put('/tags/{tag}', [TagController::class, 'update'])
        ->name('admin.tags.update');

// Eliminar categoría
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])
        ->middleware('can:admin.tags.destroy')
        ->name('admin.tags.destroy');

/*
        Post
 */
Route::get('/posts', [PostController::class, 'index'])
        ->middleware('can:admin.posts.index')
        ->name('admin.posts.index');

// Mostrar formulario de creación
Route::get('/posts/create', [PostController::class, 'create'])
        ->middleware('can:admin.posts.create')
        ->name('admin.posts.create');

// Guardar nueva categoría
Route::post('/posts', [PostController::class, 'store'])
        ->name('admin.posts.store');

// Mostrar formulario de edición
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->middleware('can:admin.posts.edit')
        ->name('admin.posts.edit');

// Actualizar categoría
Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('admin.posts.update');

// Eliminar categoría
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->middleware('can:admin.posts.destroy')
        ->name('admin.posts.destroy');


// Solo los que tengan el role de admin puedan acceder a estas rutas
Route::middleware(['auth','role:Admin'])->group(function(){

        /* USUARIOS */
        Route::resource('users', UserController::class)
                ->only(['index','edit','update']) //crea solo las rutas index, edit y update
                ->names('admin.users');

        /* ROLES */
        Route::resource('roles',RoleController::class)->names('admin.roles');
});
   

// Route::resource('posts', PostController::class)
//         ->names('admin.posts');

        
