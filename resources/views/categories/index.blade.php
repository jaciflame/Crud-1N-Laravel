@extends('layouts.principal')

@section('titulo', 'Lista de Categorías')

@section('contenido')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Lista de Categorías</h1>
    <div class="flex flex-row-reverse mb-2">
        <a href="{{route('categories.create')}}" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-add">Nuevo</i>
        </a>
    </div>
    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Id</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Color</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $categoria->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $categoria->nombre }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <span class="block w-6 h-6 rounded-full" style="background-color: {{ $categoria->color }}"></span>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <form action="{{ route('categories.destroy', $categoria) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('categories.edit', $categoria)}}" class="mr-2">
                            <i class="fas fa-edit text-blue-500"></i>
                        </a>
                        <button type="submit">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('alertas')
<x-comalerta :mensaje="session('mensaje')" />
@endsection