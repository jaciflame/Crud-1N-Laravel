<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::with("category")->orderBy('id', 'desc')->paginate(7);
        return view('products.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('products.create', compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate($this->rules());
        $datos['imagen'] = ($request->imagen) ? $request->imagen->store('img/imagenes/') : 'img/imagenes/noimage.png';
        Product::create($datos);
        return redirect()->route('products.index')->with('mensaje', "Producto creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get(); 
    return view('products.edit', compact('product', 'categorias')); 
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $datos = $request->validate($this->rules($product->id));
        $datos['imagen'] = ($request->imagen) ? $request->imagen->store('img/imagenes/') : $product->imagen;
        $imagenAnterior = $product->imagen;
        $product->update($datos);
        if (basename($imagenAnterior) != 'noimage.png' && $request->imagen) {
            Storage::delete($imagenAnterior);
        }
        return redirect()->route('products.index')->with('mensaje', "Producto Editado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (basename($product->imagen) != 'noimage.png') {
            Storage::delete($product->imagen);
        }
        $product->delete();
        return redirect()->route('products.index')->with('mensaje', "Producto Borrado");
    }
    //Validaciones 
    private function rules(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:products,nombre,' . $id],
            'descripcion' => ['required', 'string', 'min:10', 'max:150'],
            'stock' => ['required', 'int', 'min:0', 'max:9999'],
            'imagen' => ['image', 'max:8092'],
            'category_id' => 'required',
        ];
    }
}
