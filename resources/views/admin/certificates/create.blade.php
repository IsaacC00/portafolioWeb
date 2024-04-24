@extends('layouts.back')

@section('cuerpo')

<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Crear Certificado</h2>
    </div>
</div>

    <div class=" bg-white p-6 rounded-lg shadow-xl">

        {!! Form::open(['route'=>'admin.certificates.store']) !!}
            <div class="my-2">
                {!! Form::label('desc_certificado', 'Descripción del certificado',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::textarea('desc_certificado', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg h-24 font-normal']) !!}
            </div>
            @error('desc_certificado')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-2">
                {!! Form::label('inst_certificado', 'Instituto certificado',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::text('inst_certificado', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Ejm. Universidad Central del Ecuador']) !!}
            </div>
            @error('inst_certificado')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-5">
                {!! Form::label('tipo_certificado', 'Tipo de certificado',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::text('tipo_certificado', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Ejm. Educacion, Experiencia, Reconocimiento']) !!}
            </div>
            @error('tipo_certificado')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <div class="my-5">
                {!! Form::label('fecha_certificado', 'Fecha Certificado',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {!! Form::date('fecha_certificado', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'Ejm. Educacion, Experiencia, Reconocimiento']) !!}
                
            </div>
            @error('fecha_certificado')
            <p class="bg-red-500 text-white my-2 
            rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            {!! Form::submit('Crear Certificado', ['class'=>'font-bold bg-purple-600 rounded-md text-sm text-white p-2.5 cursor-pointer']) !!}
        {!! Form::close() !!}
    </div>


@endsection

