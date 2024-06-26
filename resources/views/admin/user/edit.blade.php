@extends('layouts.back')

@section('cuerpo')
<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Editar Información</h2>
    </div>
</div>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

    <div class=" bg-white p-6 rounded-lg shadow-xl">

        {!! Form::model($user,['route'=>['admin.user.update',$user],'method'=>'put','files' => true]) !!}
        <div class="my-2">
            {!! Form::label('telefono', 'Teléfono',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::text('telefono', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'0922334455']) !!}
        </div>
        @error('telefono')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-2">
            {!! Form::label('facebook', 'Facebook',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::text('facebook', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'John-Mark']) !!}
        </div>
        @error('facebook')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-5">
            {!! Form::label('instagram', 'Instagram',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::text('instagram', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'cr7cristianoronaldo']) !!}
        </div>
        @error('instagram')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-5">
            {!! Form::label('twitter', 'Twitter X',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::text('twitter', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'midudev']) !!}
        </div>
        @error('twitter')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-5 trix-content">
            {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
            {!! Form::label('descripcion', 'Descripcion Personal',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::textarea('descripcion', null, ['class'=>'w-full','rows'=>5]) !!}
        </div>
        @error('descripcion')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        <div class="my-5">
            {!! Form::label('imagen', 'Imagen Perfil',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
            {!! Form::file('imagen', ['class'=>'mb-2 block text-gray-500 font-semibold text-base uppercase']) !!}
    
         </div>
        @error('imagen')
        <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        {!! Form::submit('Actualizar Información', ['class'=>'font-bold bg-purple-600 rounded-md text-sm text-white p-2.5
        cursor-pointer']) !!}
        {!! Form::close() !!}
    </div>

@endsection