@extends('layouts.back')

@section('cuerpo')

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class="md:flex md:justify-center md:gap-10 md:items-center ">

    <div class="md:w-11/12 bg-white p-5 rounded-lg shadow-xl ">

        <h1 class="mb-2 block text-gray-500 font-bold text-lg">Imágenes del proyecto</h1>

        {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put', 'files' => true,
        'autocomplete' => 'off']) !!}

        <div
            class="flex flex-col items-center justify-center text-base bg-gray-50 p-6 border border-gray-300 rounded-md shadow-sm">
            {!! Form::label('images[]', 'Subir imágenes', ['class' => 'mb-2 text-sm font-medium text-gray-900
            dark:text-gray-300']) !!}
            {!! Form::file('images[]', ['multiple', 'id' => 'imageUpload', 'class' => ' cursor-pointer max-w-72 lg:max-w-2xl file:mr-4
            file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50
            file:text-violet-700 hover:file:bg-violet-100']) !!}

            <div id="imagePreview" class="flex flex-wrap mt-5 gap-2"></div>

            @foreach ($postImages->images as $image)
            <div class="image-container">
                <img src="{{ asset($image->image_path) }}" alt="Image" class="rounded "
                    style="width: 25%; height: auto;">
                <!-- Opción para eliminar la imagen si es necesario -->
                @if ($postImages->images->count() == 1)
                <p>Para eliminar esta imagen debe subir otra imagen.</p>
                @else
                <a href="{{ route('image.delete', $image->id) }}" class="text-black">Eliminar</a>
                @endif

            </div>
            @endforeach

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

        {!! Form::hidden('user_id', auth()->user()->id) !!}

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
            {!! Form::label('extract', 'Extracto', ['class' => 'mb-5 block text-gray-500 font-bold text-lg']) !!}
            {!! Form::text('extract', old('extract'), ['id' => 'extract', 'placeholder' => 'Pequeña descripción del proyecto',
             'class' => 'border border-zinc-400 text-base p-3 w-full rounded-lg']) !!}
            @error('extract')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
        </div>

        {!! Form::label('body', 'Detalles del proyecto', ['class' => 'my-5 block text-gray-500 font-bold text-lg']) !!}
        <div class="trix-content text-base font-normal">
            {!! Form::hidden('body', old('body'), ['id' => 'bodyInput']) !!}
            <trix-editor input="bodyInput"></trix-editor>
        </div>
        @error('body')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror

        {!! Form::submit('Actualizar Proyecto', ['class' => 'bg-purple-600 mt-8 hover:bg-purple-800 transition-colors
        cursor-pointer text-base font-bold w-full p-3 text-white rounded-lg']) !!}

        {!! Form::close() !!}


    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    @vite('resources/js/imageUpload.js')
@endpush