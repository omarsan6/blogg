<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // validar permisos
        if (! Gate::allows('admin.categories.create')) {
            abort(403,"No autorizado");
        }

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('correcto','Categoría creada correctamente :)');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // validar permisos
        if (! Gate::allows('admin.categories.edit')) {
            abort(403,"No autorizado");
        }
        
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category->update($request->all());


        return redirect()->route('admin.categories.edit',$category)->with('correcto','Categoría actualizada correctamente :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with("correcto","Categoria eliminada con éxito");
    }
}
