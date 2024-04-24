@extends('layouts.post')

@section('contenedor')

<div class=" px-6 lg:px-16">

    <h1 class="text-4xl font-bold text-white">{{$post->name}}</h1>

    <div class="text-lg text-white m-3">
        {!!$post->extract!!}
    </div>

    {{-- contenido principal --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 ">
        @foreach ($images as $image)
        <div class="col-span-1 p-2 object-cover object-center">
            <img class="zoomable cursor-pointer" src="{{ asset( $image->image_path) }}" alt="Image alt">
        </div>
        @endforeach
    </div>

    <div class="mx-5 my-4">
        {{$images->links()}}
    </div>
    {{-- mas contenido --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        <div class="col-span-2">
            <div class="text-base text-white">
                {!!$post->body!!}
            </div>

            <div class="text-white my-4">
                <h2>Autor: </h2>
                <h2 class="text-base uppercase font-bold">{{$post->user->name}}</h2>
            </div>

            <div>
                <h1 class="text-sm my-3 text-white"> última actualizacion: {{$post->updated_at->format('d/m/Y')}}
                </h1>
            </div>

        </div>

        <aside>
            <h1 class="text-2xl font-bold text-gray-300 mb-6">Mas posts relacionados con {{ $post->category->name }}
            </h1>

            @foreach ($similar as $igual)
            <div class="mb-4">
                <a class="flex" href="{{route('home.show',$igual)}}">
                    <img class="w-36 justify-start object-contain"
                        src="{{ asset($igual->images->first()->image_path) }}" alt="">
                    <h1 class="ml-4 text-gray-300 font-semibold">{!!$igual->name!!}</h1>
                </a>

            </div>
            @endforeach

        </aside>

    </div>

</div>

@endsection