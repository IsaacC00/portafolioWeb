@extends('layouts.back')

@section('cuerpo')

<h1 class="text-4xl font-bold"> Lista de Proyectos</h1>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class="my-6">
    <a href="{{route('admin.posts.create')}}" class="font-bold bg-purple-600 rounded-md text-sm text-white p-2.5">
        Agregar nuevo proyecto
    </a>
</div>

@livewire('post-index')

@endsection