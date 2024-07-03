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
        <x-informacion :information="$information" />
    </div>

    <form action="{{ route('user.edit') }}" enctype="multipart/form-data" method="POST" autocomplete="off">
        @csrf
        <div class="my-4">
            <div class="flex flex-row space-x-2">
                <label for="name" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                    Nombre de autor
                </label>
                {{-- Toltip --}}

                <span class="group relative -my-2">
                    <div
                        class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                        <div
                            class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                            Este nombre se mostrará al final <br> de la descripción de los proyectos.
                            <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                viewBox="0 0 255 255" xml:space="preserve">
                                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                            </svg>
                        </div>
                    </div>
                    <span
                        class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                </span>

                {{-- Toltip --}}
            </div>
            <input autocomplete="off" id="name" name="name" type="text" placeholder="Nombre de usuario" class="text-base border p-3 w-full rounded-lg @error('name') border-red-500
                @enderror" value="{{ auth()->user()->name }}">

            @error('name')
            <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
        </div>

        <div class="my-4">
            <div x-data="{showPassword : false}">

                <label for="oldpassword" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                    Antigua Constraseña
                </label>

                <div class="relative">
                    <input x-bind:type="showPassword ? 'text' : 'password'" autocomplete="off" id="oldpassword"
                        name="oldpassword" type="password" class="text-base border p-3 w-full rounded-lg @error('oldpassword') border-red-500
                    @enderror">
                    {{-- EYE TO SHOW AND HIDE --}}
                    <div x-on:click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </div>
                    {{-- EYE TO SHOW AND HIDE --}}
                </div>
            </div>
            @error('oldpassword')
            <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
        </div>

        <div class="my-4">
            <div x-data="{showPassword : false}">
                <div class="flex flex-row space-x-2 ">

                    <label for="password" class="mb-2 block text-gray-500 font-bold text-base uppercase">
                        Nueva Constraseña
                    </label>
                    {{-- Toltip --}}

                    <span class="group relative -my-2">
                        <div
                            class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                            <div
                                class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                                La nueva contraseña debe tener mínimo <br>
                                8 caracteres, un símbolo y un número.
                                <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                    viewBox="0 0 255 255" xml:space="preserve">
                                    <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                </svg>
                            </div>
                        </div>
                        <span
                            class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                    </span>

                    {{-- Toltip --}}
                </div>
                <div class="relative">

                    <input x-bind:type="showPassword ? 'text' : 'password'" autocomplete="off" id="password"
                        name="password" type="password"
                        class="text-base border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    {{-- EYE TO SHOW AND HIDE --}}
                    <div x-on:click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </div>
                    {{-- EYE TO SHOW AND HIDE --}}
                </div>
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="my-4">
            <div x-data="{showPassword : false}">
                <label for="password_confirmation" class="mb-2 block text-gray-500 font-bold text-base uppercase ">
                    Repetir nueva Constraseña
                </label>
                <div class="relative">
                    <input x-bind:type="showPassword ? 'text' : 'password'" autocomplete="off"
                        id="password_confirmation" name="password_confirmation" type="password"
                        class="text-base border p-3 w-full rounded-lg ">
                    {{-- EYE TO SHOW AND HIDE --}}
                    <div x-on:click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </div>
                    {{-- EYE TO SHOW AND HIDE --}}

                </div>
            </div>
        </div>
        <input type="submit" value="Editar Usuario" class="bg-purple-600  hover:bg-purple-800 transition-colors cursor-pointer
                text-base font-bold px-8 py-2.5 text-white rounded-lg ">

    </form>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>


@endsection