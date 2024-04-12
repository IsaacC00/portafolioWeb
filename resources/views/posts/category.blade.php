@extends('layouts.post')

@section('contenedor')

<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-20">
        <h2
            class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-white">
            Categoria: {{$category->name}}
        </h2>
    </div>

    <div class="flex flex-wrap">

        @foreach($posts as $post)
        <x-card :post="$post" />
        @endforeach
    </div>

</div>

<div class="mx-5 my-4">
    {{$posts->links()}}
</div>


@endsection