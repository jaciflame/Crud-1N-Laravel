<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return view('categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate($this->rules());
        Category::create($datos);
        return redirect()->route('categories.index')->with('mensaje', "Categoria creada");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $datos = $request->validate($this->rules($category->id));
        $category->update($datos);
        return redirect()->route('categories.index')->with('mensaje', "Categoria actualizada");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index")->with("mensaje", "Categoria eliminada");
    }
    //Validaciones
    public function rules(?int $id = null): array
    {
        return [
            "nombre" => ['required', 'string', 'min:3', 'max:50', 'unique:categories,nombre,' . $id],
            "color" => ['required', 'color-hex']
        ];
    }
}
