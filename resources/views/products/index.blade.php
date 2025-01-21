@extends('layouts.principal')
@section('titulo')
Productos
@endsection
@section('cabecera')
Listado de productos
@endsection
@section('contenido')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-row-reverse mb-2">
        <a href="{{route('products.create')}}" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-add">Nuevo</i>
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Imagen</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="{{Storage::url($item->imagen)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{$item->nombre}}">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$item->descripcion}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->stock}}
                </td>
                <td class="px-6 py-4">
                    <div class="p-2 rounded-xl text-center text-white font-bold" style="background-color:{{$item->category->color}}">
                        {{$item->category->nombre}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('products.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('products.edit', $item)}}" class="mr-2">
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
<div class="mt-4">
    {{$productos->links()}}
</div>
@endsection
@section('alertas')
<x-comalerta :mensaje="session('mensaje')" />
@endsection