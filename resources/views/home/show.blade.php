@extends('layouts.post')

@section('contenedor')
<section>
    <div class="relative">
        <img src="{{ asset('img/banner.png') }}" alt="Banner" class="w-full h-auto">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-4">
            <h1 class="text-3xl lg:text-5xl font-bold uppercase text-center text-white">{{$post->name}}</h1>
        </div>
    </div>
    
    <div class="px-6 lg:px-16 my-14">

        {{-- contenido principal --}}
        <div class=" scroll-container flex overflow-y-auto space-x-8 group scrollbar scrollbar-thumb-orange-500 scrollbar-track-zinc-100  ">
            <div class="flex space-x-8 animate-loop-scroll group-hover:paused">

                <div class=" relative flex flex-col w-96 ">
                    <div class="text-base text-justify">
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

                @forelse ($images as $image)

                <div class="relative flex flex-col w-96  ">
                    <img class=" zoomable cursor-pointer" src="{{ asset( $image->image_path) }}" alt="Image alt">
                </div>

                @empty

                <div>no hay imagenes que mostrar</div>

                @endforelse

            </div>

            <div class="flex space-x-8 animate-loop-scroll group-hover:paused" aria-hidden="true">

                <div class=" relative flex flex-col w-96 ">
                    <div class="text-base text-justify">
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

    <script>
        const scrollContainer = document.querySelector('.scroll-container');

        scrollContainer.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>

</section>
@endsection