@extends('layouts.back')

@section('cuerpo')

<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Editar Testimonio</h2>
    </div>
</div>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

@if (session('message'))
<div class="bg-red-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('message')}}</h1>
</div>
@endif

<div class=" bg-white p-6 rounded-lg shadow-xl">

    {!! Form::model($testimonial, ['route' => ['admin.testimonials.update', $testimonial], 'method'=>'put','enctype' =>
    'multipart/form-data']) !!}

    <div class="my-2 ">
        {!! Form::label('testimonio', 'Testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase'])
        !!}
    </div>
    {!! Form::textarea('testimonio', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg h-24 font-normal'])
    !!}
    @error('testimonio')
    <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-2 flex flex-row space-x-2">
        {!! Form::label('nombre_testimonio', 'Nombre del testimonio',['class'=>'mb-2 block text-gray-500 font-bold
        text-base uppercase']) !!}
        {{-- Toltip --}}

        <span class="group relative ">
            <div
                class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                    Campo opcional.
                    <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255"
                        xml:space="preserve">
                        <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                    </svg>
                </div>
            </div>
            <span
                class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
        </span>

        {{-- Toltip --}}
    </div>
    {!! Form::text('nombre_testimonio', null, ['class'=>'my-4 text-base border p-3 w-full
    rounded-lg','placeholder'=>'Ejm. Ing. Edison Almeida']) !!}
    @error('nombre_testimonio')
    <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-5 flex flex-row space-x-2">
        {!! Form::label('cargo_testimonio', 'Cargo del testimonio',['class'=>'mb-2 block text-gray-500 font-bold
        text-base uppercase']) !!}
        {{-- Toltip --}}

        <span class="group relative ">
            <div
                class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                    Campo opcional.
                    <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255"
                        xml:space="preserve">
                        <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                    </svg>
                </div>
            </div>
            <span
                class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
        </span>

        {{-- Toltip --}}
    </div>
    {!! Form::text('cargo_testimonio', null, ['class'=>'my-4 text-base border p-3 w-full
    rounded-lg','placeholder'=>'Ejm. Gerente de recursos finacieros']) !!}
    @error('cargo_testimonio')
    <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-5 flex flex-row space-x-2">
        {!! Form::label('imagen', 'Imagen Testimonio',['class'=>'mb-2 block text-gray-500 font-bold text-base
        uppercase']) !!}
        {{-- Toltip --}}

        <span class="group relative ">
            <div
                class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                    Campo opcional.
                    <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255"
                        xml:space="preserve">
                        <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                    </svg>
                </div>
            </div>
            <span
                class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
        </span>

        {{-- Toltip --}}
    </div>
    <div>
        <x-image-testimonial :testimonial="$testimonial" />
    </div>
    <div class="my-4">
        {!! Form::file('imagen', ['id'=>'imagePreview','class'=>'cursor-pointer max-w-72 lg:max-w-2xl file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 block']) !!}
    </div>
    @error('imagen')
    <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    {!! Form::submit('Actualizar Testimonio', ['class'=>'font-bold bg-purple-600 rounded-md text-sm text-white p-2
    cursor-pointer'])!!}
    {!! Form::close() !!}
</div>

<script>
    document.getElementById('imagePreview').addEventListener('change', function(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
            const dataURL = reader.result;
            const output = document.getElementById('preview');
            output.src = dataURL;
            output.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>


@endsection