@extends('layouts.back')

@section('cuerpo')
    
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
    
    <div class=" bg-white p-6 rounded-lg shadow-xl font-bold text-2xl">
        
        <h1>Editar información del perfil: {{auth()->user()->name}}</h1>

        <div>
            <x-informacion :information="$information"/>
        </div>

        <form action="{{ route('user.edit') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <div class="my-4">
                <label for="name" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                    Nombre de autor
                </label>
                <input 
                autocomplete="off"
                id="name" 
                name="name" 
                type="text" 
                placeholder="Nombre de usuario" 
                class="text-base border p-3 w-full rounded-lg @error('name') border-red-500
                @enderror"
                value="{{ auth()->user()->name }}"
                >
                @error('name')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="my-4">
                <label for="oldpassword" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                    Antigua Constraseña
                </label>
                <input 
                autocomplete="off"
                id="oldpassword" 
                name="oldpassword" 
                type="password" 
                class="text-base border p-3 w-full rounded-lg @error('oldpassword') border-red-500
                @enderror"
                >
                @error('oldpassword')
                    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="my-4">
                <label for="password" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                    Nueva Constraseña
                </label>
                <input 
                autocomplete="off"
                id="password" 
                name="password" 
                type="password" 
                class="text-base border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                >
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-4">
                <label for="password_confirmation" class="mb-2 block text-gray-500 font-bold text-base uppercase ">
                    Repetir nueva Constraseña
                </label>
                <input 
                autocomplete="off"
                id="password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="text-base border p-3 w-full rounded-lg "
                >
                
            </div>

            <input 
                type="submit" 
                value="Editar Usuario"
                class="bg-purple-600  hover:bg-purple-800 transition-colors cursor-pointer
                text-base font-bold px-8 py-2.5 text-white rounded-lg "
                >

        </form>

    </div>

  
@endsection