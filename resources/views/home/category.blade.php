@extends('layouts.post')

@section('contenedor')

<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-20">
        <h2
            class="sm:text-4xl text-2xl font-bold title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
            Proyectos Tipo: {{$category->name}}
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 items-center justify-center">

        @foreach($posts as $post)
        <x-card :post="$post" />
        @endforeach
    </div>

</div>

@endsection