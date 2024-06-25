@extends('layouts.post')

@section('contenedor')

<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-20">
        <h2
        class="sm:text-4xl text-2xl font-bold title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
        Proyectos</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 items-center justify-center">


        @forelse ($posts as $post)

        <div class="group relative items-center justify-center overflow-hidden cursor-pointer hover:shadow-xl hover:shadow-black/30 transition-shadow">
            
            <div class="h-full w-full" >
                <img class="h-full w-full object-cover group-hover:rotate-3 group-hover:scale-125 duration-500 " src="{{  asset($post->images->first()->image_path ) }}" alt="">
            </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70 "></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-9 text-center translate-y-[60%] group-hover:translate-y-0 transition-all ">
                    <h1 class="text-2xl text-white font-bold mb-28">{!! $post->name !!}</h1>
                    <p class="text-lg italic text-white mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{!! substr ($post->extract, 0 , 120) !!}</p>
                    <a class="rounded-full shadow shadow-black/60 bg-neutral-900 py-2 px-3.5 text-sm capitalize text-white " href="{{ route('home.show',$post)}}">Ver proyecto </a>
                </div>         
        </div>

        @empty
        <div class="flex flex-row w-full">

            No hay Post que mostrar

        </div>
        @endforelse
        
    </div>
</div>

@endsection