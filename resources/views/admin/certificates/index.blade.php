@extends('layouts.back')

@section('cuerpo')
<h1 class="text-4xl font-bold">Lista de Certificados</h1>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class="my-6">
    <a href="{{route('admin.certificates.create')}}" class="bg-purple-600 rounded-md text-sm text-white p-2.5">
        Agregar Certificado
    </a>
</div>
{{-- crud--}}

<div class=" overflow-x-auto my-8">
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            
            <th scope="col" class="px-6 py-5">
                Instituto Certificado
            </th>
            <th scope="col" class="px-6 py-5">
                Tipo Certificado
            </th>
            <th scope="col" class="px-6 py-5">
                Fecha Certificado
            </th>
            <th scope="col" class="px-6 py-5">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>

        @forelse ($certificates as $row)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

            <td class="px-6 py-4">
                {{$row->inst_certificado}}
            </td>

            <td class="px-6 py-4">
                {{$row->tipo_certificado}}
            </td>

            <th scope="row" class="px-6 py-4">
                {{$row->fecha_certificado}}
            </th>

            <td class="px-6 py-4 space-x-4 flex items-center">
                <a href="{{route('admin.certificates.edit',$row->id)}}" class="text-gray-800">Editar</a>
                {{-- delete--}}
                <form action="{{route('admin.certificates.destroy',$row->id)}}" method="POST" >
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-purple-600"> Eliminar </button>
                
                </form>
                {{-- delete--}}
            </td>

        </tr>
        @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th class=" p-4 items-center">
                <p>No hay datos</p>
            </th >
            <th class=" p-4 items-center">
                <p>No hay datos</p>
            </th >
            <th class=" p-4 items-center">
                <p>No hay datos</p>
            </th >
            <th class=" p-4 items-center">
                <p>No hay datos</p>
            </th >
        </tr>
        @endforelse
        
    </tbody>
</table>
</div>

{{-- crud--}}

@endsection
