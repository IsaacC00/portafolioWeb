@extends('layouts.back')

@section('cuerpo')

<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Editar Categoría</h2>
    </div>
</div>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

    <div class=" bg-white p-6 rounded-lg shadow-xl">

        {!! Form::model($category,['route'=>['admin.categories.update',$category],'method'=>'put']) !!}
        <div class="my-2">
            {!! Form::label('name', 'Nombre',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::text('name', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Nombre de la categoría']) !!}
        </div>
        @error('name')
        <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-5">
            {!! Form::label('slug', 'Nombre (slug)',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase'])
            !!}
            {!! Form::text('slug', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Slug','id' => 'slug', 'readonly' => 'readonly']) !!}
        </div>
        @error('slug')
        <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        {!! Form::submit('Actualizar categoría', ['class'=>'font-bold bg-purple-600 rounded-md text-sm text-white p-2.5
        cursor-pointer']) !!}
        {!! Form::close() !!}
    </div>

    <script>
        document.getElementById('name').addEventListener('input', function() {
            const slugInput = document.getElementById('slug');
            slugInput.value = 'proyectos-' + this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
        });
    </script>

@endsection