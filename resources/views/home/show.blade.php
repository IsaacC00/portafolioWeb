@extends('layouts.post')

@section('contenedor')
<section>
    <div class="relative">
        <img src="{{ asset('img/banner.png') }}" alt="Banner" class="w-full h-auto">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-4">
            <h1 class="text-3xl lg:text-5xl font-bold uppercase text-center text-white">Proyecto {{$post->category->name.' : '.$post->name}}</h1>
        </div>
    </div>

    <div class="px-6 lg:px-6 my-14">

        {{-- contenido principal --}}
        <div
            class=" scroll-container flex overflow-y-auto space-x-8 group scrollbar scrollbar-thumb-orange-500 scrollbar-track-zinc-100  ">
            <div class="flex space-x-8 animate-loop-scroll group-hover:paused">

                @forelse ($images as $image)

                <div class="relative flex flex-col w-96  ">
                    <img class=" zoomable cursor-pointer" src="{{ asset( $image->image_path) }}" alt="Image alt">
                </div>

                @empty

                <div>no hay imagenes que mostrar</div>

                @endforelse

            </div>

            <div class="flex space-x-8 animate-loop-scroll group-hover:paused" aria-hidden="true">

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

    <div class="bg-black relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 items-center justify-center py-10 ">

        <div class="flex flex-row items-center justify-center text-center">
            @if ($post->video)
            <iframe src="{{$post->video}}" width="420" height="760" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                
            @else
            <iframe src="https://player.vimeo.com/video/916931339?h=48dcef5f58" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

            @endif
        </div>

        <div class="col-span-1 flex flex-col w-full text-white justify-center p-10">
            <div class="text-base text-justify ">
                {{$post->body}}
            </div>

            <div class="mt-10">
                <h2 class="">Autor: </h2>
                <h2 class="text-base uppercase font-bold">{{$post->user->name}}</h2>
            </div>

            <div>
                <h1 class="text-sm text-justify my-3"> última actualizacion:
                    {{$post->updated_at->format('d/m/Y')}}
                </h1>
            </div>

        </div>

    </div>   

    <script>
        const scrollContainer = document.querySelector('.scroll-container');

        scrollContainer.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>
    <script src="https://player.vimeo.com/api/player.js"></script>

</section>
@endsection