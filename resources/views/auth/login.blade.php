@extends('layouts.post')

@section('contenedor')

<div class="container px-5 py-20 mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2
            class="sm:text-4xl text-2xl font-bold title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
            Iniciar Sesión</h2>
        <p class="lg:w-2/3 mx-auto mt-5 leading-relaxed font-semibold">
            Inicia sesión para administrar este portafolio
        </p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="bg-zinc-900  p-6 rounded-lg h-full block items-start">

            <form action="{{route('login')}}" method="POST" class="flex-wrap">
                @csrf

                @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 
                rounded-lg text-sm p-2 text-center font-bold">{{session('mensaje')}}</p>
                @endif

                @if (session('info'))
                <p class="bg-green-500 text-white my-2 
                rounded-lg text-sm p-2 text-center font-bold">{{session('info')}}</p>
                @endif

                <div class="p-2 w-full">
                    <label for="email" class="leading-7 text-sm text-slate-200 uppercase">Correo</label>
                    <input name="email" id="email" type="email"
                        class="w-full bg-secondary-600 bg-opacity-40 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8 "
                        type="text">
                    @error('email')
                    <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>
                <div class="p-2 w-full">
                    <div x-data="{showPassword : false}">
                        <label for="password" class="leading-7 text-sm text-slate-200 uppercase">Contraseña</label>
                        <div class="relative">
                            <input x-bind:type="showPassword ? 'text' : 'password'" id="password" name="password"
                                class="w-full bg-secondary-600 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8"
                                type="password">
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
                    @error('password')
                    <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>

                <div class="block my-auto">
                    <div class="p-2">
                        <input type="checkbox" name="remember">
                        <label for="" class=" text-white text-xs uppercase">
                            Mantener mi sesión abierta
                        </label>
                    </div>

                    <div class="p-2">
                        <a href="{{route('forget.password')}}" class="text-white text-xs uppercase">
                            Olvide mi contraseña
                        </a>
                    </div>
                </div>

                <div class="p-4 w-full">
                    <input type="submit" value="Iniciar Sesión"
                        class="cursor-pointer flex mx-auto text-white bg-orange-600 hover:bg-black hover:text-slate-200 border-lg font-semibold py-4 px-10 focus:outline-nonerounded text-base uppercase">
                </div>


            </form>

        </div>
    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

@endsection