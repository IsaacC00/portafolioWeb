@extends('layouts.post')

@section('contenedor')

<div class=" px-6 lg:px-16">

    <h1 class="text-4xl my-10 font-bold ">{{$post->name}}</h1>

    {{-- <div class="text-lg text-white m-3">
        {!!$post->extract!!}
    </div> --}}

    {{-- contenido principal --}}
    <div class=" flex overflow-y-auto space-x-8 group ">
        <div class="flex space-x-8 animate-loop-scroll group-hover:paused">

            <div class=" relative flex flex-col w-96 ">
                <div class="text-base ">
                    {!!$post->body!!}
                </div>
                
                <div class="">
                    <h2 class="">Autor: </h2>
                    <h2 class="text-base uppercase font-bold">{{$post->user->name}}</h2>
                </div>
    
                <div>
                    <h1 class="text-sm text-justify my-3"> última actualizacion: {{$post->updated_at->format('d/m/Y')}}
                    </h1>
                </div>
    
            </div>

            @forelse ($images as $image)

            <div class="relative flex flex-col w-96 ">
                <img class=" zoomable cursor-pointer" src="{{ asset( $image->image_path) }}" alt="Image alt">
            </div>

            @empty

            <div>no hay imagenes que mostrar</div>
            
            @endforelse

        </div>

        <div class="flex space-x-8 animate-loop-scroll group-hover:paused" aria-hidden="true">

            <div class=" relative flex flex-col w-96 ">
                <div class="text-base ">
                    {!!$post->body!!}
                </div>
    
                <div class= my-4">
                    <h2>Autor: </h2>
                    <h2 class="text-base uppercase font-bold">{{$post->user->name}}</h2>
                </div>
    
                <div>
                    <h1 class="text-sm my-3"> última actualizacion: {{$post->updated_at->format('d/m/Y')}}
                    </h1>
                </div>
    
            </div>

            @forelse ($images as $image)

            <div class="relative flex flex-col w-96 ">
                <img class=" zoomable cursor-pointer" src="{{ asset( $image->image_path) }}" alt="Image alt">
            </div>

            @empty

            <div>no hay imagenes que mostrar</div>
            
            @endforelse

        </div>
    </div>

</div>

@endsection