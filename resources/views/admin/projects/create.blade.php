@extends('layouts.back')

@section('cuerpo')

<div class="md:flex md:justify-center md:gap-10 md:items-center ">

    <div class="md:w-11/12 bg-white p-5 rounded-lg shadow-xl ">
        
        <h1 class="mb-2 block text-gray-500 font-bold text-lg">Imagenes del proyecto</h1>
        

        <form action="{{route('admin.portfolio.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="flex flex-col items-center justify-center bg-gray-50 p-6 border border-gray-300 rounded-md shadow-sm">
                
                <input type="file" name="images[]" multiple id="imageUpload" 
                accept="image/*"
                class="cursor-pointer  text-xs md:text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full 
                file:border-0 file:text-sm file:font-semibold file:bg-white file:text-gray-500
                 hover:file:bg-violet-100 "/>
                 
                <div id="imagePreview" class="flex flex-wrap gap-2 text-base text-center ">
                    
                    @error('images.*')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                </div>
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> 

            <div class="my-6">
                <label for="titulo" class="mb-2 block text-gray-500 font-bold text-lg">
                    Titulo
                </label>
                <input 
                id="titulo" 
                name="titulo" 
                type="text" 
                
                placeholder="Titulo del proyecto" 
                class="text-base border p-3 w-full rounded-lg @error('titulo') border-red-500
                @enderror"
                value="{{ old('titulo') }}"
                >
                @error('titulo')
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
                    Categoria
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
            
            <label for="extract" class="mb-5 block text-gray-500 font-bold text-lg">
                Extracto
            </label>

            <div class="trix-content text-base font-normal">
                <input id="extractInput" value="{{ old('extract') }}" type="hidden" name="extract">
                <trix-editor input="extractInput"></trix-editor>
            </div>

            @error('extract')
                <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
            
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


