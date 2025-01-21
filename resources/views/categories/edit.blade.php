@extends('layouts.principal')

@section('titulo')
Editar Categoria
@endsection

@section('cabecera')
Editar Categoria
@endsection

@section('contenido')
<div class="p-8 max-w-3xl mx-auto bg-white rounded-xl shadow-2xl">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
                value="{{ old('nombre', $category->nombre) }}"
                type="text"
                id="nombre"
                name="nombre"
                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent sm:text-lg"
                placeholder="Nombre de la categoría"
                required />
            <x-error for="nombre" />
        </div>
        <div class="mb-6">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input
                value="{{ old('color', $category->color) }}"
                type="color"
                id="color"
                name="color"
                class="w-full h-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            <x-error for="color" />
        </div>
        <div class="flex justify-between items-center gap-4 mt-6">
            <button
                type="submit"
                class="bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 focus:outline-none transform transition-all duration-300 font-semibold text-lg shadow-lg">
                <i class="fas fa-save mr-2"></i>Editar
            </button>
            <a
                href="{{ route('categories.index') }}"
                class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 focus:outline-none transform transition-all duration-300 font-semibold text-lg shadow-lg">

                <i class="fas fa-times mr-2"></i>Cancelar
            </a>
        </div>
    </form>
</div>
@endsection