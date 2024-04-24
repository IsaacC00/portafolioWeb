@extends('layouts.back')

@section('cuerpo')

<div class="md:flex md:justify-center md:gap-10 md:items-center ">

    <div class="md:w-11/12 bg-white p-5 rounded-lg shadow-xl ">
        
        <h1 class="mb-2 block text-gray-500 font-bold text-lg">Imágenes del proyecto</h1>
        

        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class=" flex flex-col items-center justify-center text-base bg-gray-50 p-6 border border-gray-300 rounded-md shadow-sm">
                <label for="images[]" class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subir imágenes</label>
                <input type="file" name="images[]" multiple id="imageUpload" class="cursor-pointer max-w-72 lg:max-w-2xl file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"/>
              
                <div id="imagePreview" class="flex flex-wrap mt-5 gap-2"></div>

                @if ($errors->has('images.*'))
                    @foreach ($errors->get('images.*') as $error)
                    <p class="bg-red-500 text-white my-2
                    rounded-lg text-sm p-2 text-center">{{$error[0]}}</p>
                    @endforeach
                @endif

                @error('images')
                <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
               
            </div>

            <div class="my-6">
                <label for="name" class="mb-2 block text-gray-500 font-bold text-lg">
                    Titulo
                </label>
                <input 
                id="name" 
                name="name" 
                type="text" 
                
                placeholder="Titulo del proyecto" 
                class="border-zinc-400 text-base border p-3 w-full rounded-lg @error('titulo') 
                @enderror"
                value="{{ old('name') }}"
                >
                @error('name')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="mb-2 block text-gray-500 font-bold text-lg">Estado</label>
                <label class="text-base font-semibold block my-2">
                    <input type="radio" name="status" id="status1" value="1" {{ old('status') != 2 ? 'checked' : '' }}>
                    Borrador
                </label>
                <label class="text-base font-semibold ">
                    <input type="radio" name="status" id="status2" value="2" {{ old('status') == 2 ? 'checked' : '' }}>
                    Publicado
                </label>
            </div>
            

            <div class="my-10">

                <label for="category_id" class="mb-2 block text-gray-500 font-bold text-lg">
                    Categoría
                </label>

                <select
                id="category_id"
                name="category_id"  
                type="select" 
                class="text-base border p-3 w-full rounded-lg font-semibold 
                @error('category_id') border-red-500
                @enderror"
                >
                
                @foreach ($categories as $cat)
                <option 
                    value="{{$cat->id}}">
                    {{$cat->name}}
                </option>            
                @endforeach

                </select>

                @error('category_id')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror

            </div> 

            <div class="my-6">
                <label for="extract" class="mb-5 block text-gray-500 font-bold text-lg ">
                    Extracto
                </label>
                <input 
                id="extract" 
                name="extract" 
                type="text" 
                
                placeholder="Pequeña descripción del proyecto" 
                class="border border-zinc-400 text-base p-3 w-full rounded-lg @error('extract')
                @enderror"
                value="{{ old('extract') }}"
                >
                @error('extract')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            
            <label for="body" class="my-5 block text-gray-500 font-bold text-lg">
                Detalles del proyecto
            </label>

            <div class="trix-content text-base font-normal">
                <input id="bodyInput" value="{{ old('body') }}" type="hidden" name="body">
                <trix-editor input="bodyInput"></trix-editor>
            </div>
          
            @error('body')
                <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror

            <input 
                type="submit" 
                value="Crear Proyecto"
                class="bg-purple-600 mt-8 hover:bg-purple-800 transition-colors cursor-pointer
                text-base font-bold w-full p-3 text-white rounded-lg "
                >
        </form>
        
    </div>
</div>    

@endsection

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    @vite('resources/js/imageUpload.js')
@endpush

