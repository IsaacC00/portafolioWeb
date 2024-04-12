@extends('layouts.post')

@section('contenedor')

<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-20">
        <h2
        class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-white">
        Portfolio</h2>
    </div>

    <div class=" flex flex-wrap">


        @forelse ($posts as $post)

        <div class="xl:w-1/3 md:w-1/2 p-4"><a href="{{ route('posts.show',$post)}}"">
            <h1 class=" text-white font-semibold text-xs">quitar texto enriquezido de extract</h1>
                <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg">
                    <div class="relative h-40 rounded bg-cover bg-center mb-6 hover:scale-105 duration-500"
                        style="background-image: url('{{ Storage::url($post->images->first()->image_path) }}')">
                    </div>
                    <h1 class="text-lg text-slate-200 font-semibold mb-4">{{$post->name}}</h1>
                    <p class="leading-relaxed text-slate-200 text-base">
                        {{$post->extract}}
                    </p>
                </div>
            </a>
        </div>

        @empty
        <article class="w-full h-80 bg-cover bg-center bg-slate-700">

            No hay Post que mostrar

        </article>
        @endforelse
        
    </div>
</div>

<div class="mx-5 my-4">
    {{$posts->links()}}
</div>


@endsection