@extends('layouts.back')

@section('cuerpo')
    <h1>Editar Post</h1>

    @if (session('info'))
        <div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
            <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
        </div>
    @endif

    @foreach ($post->images as $image)
        <img src="{{ Storage::url($image->image_path) }}" alt="">
    @endforeach

@endsection