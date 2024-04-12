@extends('layouts.back')

@section('cuerpo')    

    <h1 class="text-4xl font-bold"> Todos los Proyectos</h1>
    
    <div class="my-6">
        <a href="{{route('admin.portfolio.create')}}" class="bg-purple-600 rounded-md text-sm text-white p-2.5">
            Agregar nuevo Proyecto 
        </a>
    </div>

    @livewire('post-index')

@endsection