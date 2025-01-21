@extends('layouts.principal')

@section('titulo')
Editar Producto
@endsection

@section('cabecera')
Editar Producto
@endsection

@section('contenido')
<div class="p-8 max-w-3xl mx-auto bg-white rounded-xl shadow-2xl">
    <form method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{@old('nombre', $product->nombre)}}" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent sm:text-lg">
            <x-error for="nombre" />
        </div>
        <div class="mb-6">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent sm:text-lg">{{@old('descripcion', $product->descripcion)}}</textarea>
            <x-error for="descripcion" />
        </div>
        <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select id="category_id" name="category_id"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $item)
                <option value="{{$item->id}}" @selected(@old('category_id', $product->category_id)==$item->id)>{{$item->nombre}}</option>
            @endforeach
        </select>
            <x-error for="category_id" />
        </div>
        <div class="mb-6">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="text" id="stock" name="stock" value="{{@old('stock', $product->stock)}}" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent sm:text-lg">
            <x-error for="stock" />
        </div>
        <div class="mb-6">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
            <div class="flex justify-between">
                <div>
                    <input type="file" name="imagen" accept="image/*" id="imagen" class="mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm"
                        oninput="preview.src=window.URL.createObjectURL(this.files[0])" />
                </div>
                <div class="ml-4">
                    <img id="preview" src="{{Storage::url($product->imagen)}}" class="w-56 aspect-video object-cover border-4 border-gray-300 rounded-lg shadow-sm">
                </div>
            </div>
            <x-error for="imagen" />
        </div>
        <div class="flex flex-row-reverse gap-4 mt-6">
            <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 focus:outline-none transform transition-all duration-300 font-semibold text-lg shadow-lg">
                <i class="fas fa-save mr-2"></i>Editar
            </button>

            <a href="{{route('products.index')}}" class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 focus:outline-none transform transition-all duration-300 font-semibold text-lg shadow-lg">
                <i class="fas fa-times mr-2"></i>Cancelar
            </a>
        </div>

    </form>
</div>
@endsection