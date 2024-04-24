@extends('layouts.back')

@section('cuerpo')
    <h1 class="text-4xl font-bold"> Lista de Categorías</h1>

    @if (session('info'))
    <div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
        <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
    </div>
@endif

    <div class="my-6">
        <a href="{{route('admin.categories.create')}}" class="bg-purple-600 rounded-md text-sm text-white p-2.5 font-bold">
            Agregar Categorías
        </a>
    </div>
    {{-- crud--}}

<div class=" overflow-x-auto my-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 font-semibold">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-5">
                    ID
                </th>
                <th scope="col" class="px-6 py-5">
                    Categorías
                </th>
                <th scope="col" class="px-6 py-5">
                    Fecha de Creación
                </th>
                <th scope="col" class="px-6 py-5">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($category as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$row->id}}
                </th>

                <td class="px-6 py-4">
                    {{$row->name}}
                </td>

                <td class="px-6 py-4">
                    {{$row->created_at}}
                </td>

                <td class="px-6 py-4 space-x-4 flex items-center">
                    <a href="{{route('admin.categories.edit',$row->id)}}" class="text-blue-800">Editar</a>
                    {{-- delete--}}
                    <form action="{{route('admin.categories.destroy',$row)}}" method="POST" >
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-purple-600"> Eliminar </button>
                    
                    </form>
                    {{-- delete--}}
                </td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>


    {{-- crud--}}

@endsection