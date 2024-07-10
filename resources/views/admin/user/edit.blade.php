@extends('layouts.back')

@section('cuerpo')
<div class="container px-5  mx-auto ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-black">Editar Información</h2>
    </div>
</div>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class=" bg-white p-6 rounded-lg shadow-xl">

    {!! Form::model($user,['route'=>['admin.user.update',$user],'method'=>'put','files' => true]) !!}

    <div class="my-2 flex flex-row space-x-2">
        {!! Form::label('telefono', 'Teléfono',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
        {{-- Toltip --}}
        <div>
            <span class="group relative">
                <div
                    class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                    <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                        Ingresar todo el numero sin espacios <br> ni extensiones. Ejemplo:<strong>0999797144</strong>
                        <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                            viewBox="0 0 255 255" xml:space="preserve">
                            <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                        </svg>
                    </div>
                </div>
                <span
                    class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
            </span>
        </div>
        {{-- Toltip --}}
    </div>
    {!! Form::text('telefono', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'0922334455']) !!}
    @error('telefono')
    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-2 flex flex-row space-x-2">
        {!! Form::label('facebook', 'Facebook',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {{-- Toltip --}}
                <div>
                    <span class="group relative">
                        <div
                            class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                            <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                                Introduce solo el nombre de usuario de la url <br> facebook.com/<strong>diegoruzzarin</strong>
                                <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                    viewBox="0 0 255 255" xml:space="preserve">
                                    <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                </svg>
                            </div>
                        </div>
                        <span
                            class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                    </span>
                </div>
                {{-- Toltip --}}
    </div>
    {!! Form::text('facebook', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'John-Mark']) !!}
    @error('facebook')
    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-5 flex flex-row space-x-2">
        {!! Form::label('instagram', 'Instagram',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {{-- Toltip --}}
                <div>
                    <span class="group relative">
                        <div
                            class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                            <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                                Introduce solo el nombre de usuario de la url <br> instagram.com/<strong>cr7cristianoronaldo</strong>
                                <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                    viewBox="0 0 255 255" xml:space="preserve">
                                    <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                </svg>
                            </div>
                        </div>
                        <span
                            class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                    </span>
                </div>
                {{-- Toltip --}}
    </div>
    {!! Form::text('instagram', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'cr7cristianoronaldo']) !!}
    @error('instagram')
    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-5 flex flex-row space-x-2">
        {!! Form::label('twitter', 'Twitter X',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                {{-- Toltip --}}
                <div>
                    <span class="group relative">
                        <div
                            class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                            <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                                Introduce solo el nombre de usuario de la url <br> x.com/<strong>BillGates</strong>
                                <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                    viewBox="0 0 255 255" xml:space="preserve">
                                    <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                </svg>
                            </div>
                        </div>
                        <span
                            class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                    </span>
                </div>
                {{-- Toltip --}}
    </div>
    {!! Form::text('twitter', null, ['class'=>'my-4 text-base border p-3 w-full rounded-lg','placeholder'=>'midudev']) !!}
    @error('twitter')
    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    <div class="my-5 trix-content flex flex-row space-x-2">
        {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
        {!! Form::label('descripcion', 'Descripcion Personal',['class'=>'mb-2 block text-gray-500 font-bold text-base uppercase']) !!}
                        {{-- Toltip --}}
                        <div>
                            <span class="group relative">
                                <div
                                    class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto">
                                    <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
                                        La descripción es <strong>opcional</strong> 
                                        <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px"
                                            viewBox="0 0 255 255" xml:space="preserve">
                                            <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="border-2 border-solid px-2 rounded-full border-gray-500 text-gray-500 font-bold text-sm uppercase">?</span>
                            </span>
                        </div>
                        {{-- Toltip --}}
    </div>
    {!! Form::textarea('descripcion', null, ['class'=>'w-full','rows'=>5]) !!}
    @error('descripcion')
    <p class="bg-red-500 text-white my-2 
                    rounded-lg text-sm p-2 text-center">{{$message}}</p>
    @enderror

    {!! Form::submit('Actualizar Información', ['class'=>'mt-5 font-bold bg-purple-600 rounded-md text-sm text-white p-2.5 cursor-pointer']) !!}
    {!! Form::close() !!}
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.bundle.js"></script>

@endsection