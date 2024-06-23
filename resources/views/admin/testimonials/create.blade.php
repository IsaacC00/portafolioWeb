@extends('layouts.back')

@section('cuerpo')

<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Crear Testimonio</h2>
    </div>
</div>

    <div class=" bg-white p-6 rounded-lg shadow-xl">

        {!! Form::open(['route'=>'admin.testimonials.store','enctype' => 'multipart/form-data']) !!}
            <div class="my-2">
                {!! Form::label('testimonio', 'Testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::textarea('testimonio', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg h-24 font-normal']) !!}
            </div>
            @error('testimonio')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-2">
                {!! Form::label('nombre_testimonio', 'Nombre del testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::text('nombre_testimonio', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Ejm. Ing. Edison Almeida']) !!}
            </div>
            @error('nombre_testimonio')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-5">
                {!! Form::label('cargo_testimonio', 'Cargo del testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::text('cargo_testimonio', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Ejm. Gerente de recursos finacieros']) !!}
            </div>
            @error('cargo_testimonio')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-5">
                {!! Form::label('imagen', 'Imagen Testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::file('imagen', ['class'=>'font-semibold mb-2 block text-gray-500 font-bold text-base ']) !!}
        
             </div>
            @error('imagen')
            <p class="bg-red-500 text-white my-2 
                        rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            {!! Form::submit('Crear Testimonio', ['class'=>'font-bold bg-purple-600 rounded-md text-sm text-white p-2.5 cursor-pointer']) !!}
        {!! Form::close() !!}
    </div>


@endsection

