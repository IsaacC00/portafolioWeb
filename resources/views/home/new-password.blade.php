@extends('layouts.post')

@section('contenedor')
<div class="container px-5 py-20 mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-3xl text-2xl font-semibold title-font mb-4 text-white">Nueva Contraseña</h2>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="bg-zinc-900 bg-opacity-40 p-3 rounded-lg h-full block items-start">

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
                    <label for="password" class="leading-7 text-sm text-slate-200 uppercase">Nueva Contraseña</label>
                    <input
                    id="password"
                    name="password"
                        class="w-full bg-secondary-600 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8"
                        type="password">
                        @error('password')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>

                <div class="p-2 w-full">
                    <label for="password" class="leading-7 text-sm text-slate-200 uppercase">Confirmar Contraseña</label>
                    <input
                    id="password_confirmation"
                    name="password_confirmation"
                        class="w-full bg-secondary-600 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8"
                        type="password">
                        @error('password_confirmation')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
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