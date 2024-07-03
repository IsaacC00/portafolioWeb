@extends('layouts.post')

@section('contenedor')
<div class="container px-5 py-20 mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-3xl text-2xl font-semibold title-font mb-4 text-white">Nueva Contraseña</h2>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="bg-zinc-900 p-3 rounded-lg h-full block items-start">

            <form action="{{route('reset.password.post')}}" method="POST" class="flex-wrap" autocomplete="off">
                @csrf

                @if (session('info'))
                <p class="bg-green-500 text-white my-2 
                rounded-lg text-sm p-2 text-center font-bold">{{session('mensaje')}}</p>
                @endif

                <input type="text" hidden name="token" value="{{$token}}">

                <div class="p-2 w-full">
                    <label for="email" class="leading-7 text-sm text-slate-200 uppercase">Correo</label>
                    <input
                    name="email" 
                    id="email" 
                    type="email" 
                        class="w-full bg-secondary-600 bg-opacity-40 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8 "
                        type="text">
                    @error('email')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>

                <div class="p-2 w-full">
                    <div x-data="{showPassword : false}"> 

                        <div class="flex flex-row space-x-2">
                            <label  for="password" class="leading-7 text-sm text-slate-200 uppercase">Nueva Contraseña</label>
                              {{-- Toltip --}}

                    <span class="group relative">
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
                            class="border border-solid px-2 rounded-full border-slate-200 text-slate-200 text-sm uppercase">?</span>
                    </span>

                {{-- Toltip --}}
                        </div>

                        <div class="relative">
                            <input
                            x-bind:type="showPassword ? 'text' : 'password'"
                            id="password"
                            name="password"
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
                        @error('password')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-full">
                    <div x-data="{showPassword : false}">

                        <label for="password" class="leading-7 text-sm text-slate-200 uppercase">Confirmar Contraseña</label>
                        <div class="relative">

                            <input
                            x-bind:type="showPassword ? 'text' : 'password'"
                            id="password_confirmation"
                            name="password_confirmation"
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
                        @error('password_confirmation')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="p-4 w-full">
                   <input type="submit"
                   value="Cambiar constraseña"
                   class="cursor-pointer flex mx-auto text-white bg-orange-600 hover:bg-black hover:text-slate-200 border-lg font-semibold py-4 px-10 focus:outline-nonerounded text-base uppercase"
                   >
                </div>

               
            </form>

        </div>
    </div>
</div>
@endsection