@extends('layouts.back')

@section('cuerpo')
<section>
<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Editar Proyecto: <br> {{$post->name ? $post->name : 'Sin Titulo' }} </h2>
    </div>
</div>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class=" bg-white p-5 rounded-lg shadow-xl ">

    <h1 class="mb-2 block text-gray-500 font-bold text-lg">Imágenes del proyecto</h1>

    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put', 'files' => true,
    'autocomplete' => 'off']) !!}

    <div class="flex flex-col items-center text-base bg-gray-50 p-6 border border-gray-300 rounded-md shadow-sm">
        {!! Form::label('images[]', 'Subir Nuevas Imágenes', ['class' => 'mb-2 text-sm font-medium text-gray-900
        dark:text-gray-300']) !!}
        {!! Form::file('images[]', ['multiple', 'id' => 'imageUpload', 'class' => ' cursor-pointer max-w-72
        lg:max-w-2xl file:mr-4
        file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50
        file:text-violet-700 hover:file:bg-violet-100']) !!}

        <div id="imagePreview" class="flex flex-wrap mt-5 gap-2"></div>


        @error('images')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        @if ($errors->has('images.*'))
        @foreach ($errors->get('images.*') as $error)
        <p class="bg-red-500 text-white my-2
                    rounded-lg text-sm p-2 text-center">{{$error[0]}}</p>
        @endforeach
        @endif

    </div>

    <div class="flex flex-row overflow-x-auto items-start mt-5">
        <div class="flex flex-row w-72 lg:w-96  ">
            <div class="flex space-x-8 ">
                @forelse ($postImages->images as $image)
                <div class="image-container relative flex flex-col w-56 lg:w-96 mb-10">
                    <img src="{{ asset($image->image_path) }}" alt="Image" class=" rounded">
                    <!-- Opción para eliminar la imagen si es necesario -->
                    @if ($postImages->images->count() == 1)
                    <p>Para eliminar esta imagen debe subir otra imagen.</p>
                    @else

                    <a onclick="showDialog({{$image->id}})"
                        class="bg-red-600 text-white p-2 text-center rounded-lg font-semibold mt-5 cursor-pointer ">Eliminar Imagen
                    </a>

                    {{-- Eliminar --}}
                    <div id="dialog-{{ $image->id }}"
                        class="hidden fixed left-0 top-0 z-10 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Está seguro
                                        que desea eliminar
                                        esta imagen? {{$image->id}}
                                    </h3>
                                    <div class=" flex flex-row items-center justify-center">

                                        <a href="{{ route('image.delete', $image->id) }}"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Si, Deseo Eliminar
                                        </a>

                                        <button type="button" onclick="removeDialog({{$image->id}})"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Eliminar --}}

                    @endif
                </div>
                @empty
                <div>
                    no hay fotos
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="my-6">
        {!! Form::label('name', 'Titulo', ['class' => 'mb-2 block text-gray-500 font-bold text-lg']) !!}
        {!! Form::text('name', null, ['placeholder' => 'Titulo del proyecto', 'class' => 'border-zinc-400 text-base
        border p-3 w-full rounded-lg']) !!}
        @error('name')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>



    <div>
        {!! Form::label('status', 'Estado', ['class' => 'mb-2 block text-gray-500 font-bold text-lg']) !!}
        <div class="text-base font-semibold block my-2">
            {!! Form::radio('status', '1', old('status') != 2, ['id' => 'status1']) !!} Borrador
        </div>
        <div class="text-base font-semibold">
            {!! Form::radio('status', '2', old('status') == 2, ['id' => 'status2']) !!} Publicado
        </div>
    </div>

    <div class="my-10">
        {!! Form::label('category_id', 'Categoría', ['class' => 'mb-2 block text-gray-500 font-bold text-lg']) !!}
        {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'text-base border p-3
        w-full rounded-lg font-semibold']) !!}
        @error('category_id')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <div class="my-6">
        {!! Form::label('portada', 'Portada proyecto', ['class' => 'mb-5 block text-gray-500 font-bold text-lg']) !!}
        {!! Form::file('portada', ['class'=>'cursor-pointer max-w-72 lg:max-w-2xl file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100']) !!}
        @error('portada')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    {!! Form::label('body', 'Detalles del proyecto', ['class' => 'my-5 block text-gray-500 font-bold text-lg']) !!}
    {!! Form::textarea('body', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg h-24 font-normal']) !!}
          
    @error('body')
    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    {!! Form::submit('Actualizar Proyecto', ['class' => 'bg-purple-600 mt-8 hover:bg-purple-800 transition-colors
    cursor-pointer text-base font-bold w-full p-3 text-white rounded-lg']) !!}

    {!! Form::close() !!}

</div>

</section>
@endsection

@push('js')
@vite('resources/js/imageUpload.js')
<script>
    function showDialog(id){
        let dialog = document.getElementById(`dialog-${id}`);
        dialog.classList.remove("hidden")
        dialog.classList.remove("opacity-10")
        
    }

    function removeDialog(id){
        let dialog = document.getElementById(`dialog-${id}`);
        dialog.classList.add("hidden")
        
    }
</script>
@endpush