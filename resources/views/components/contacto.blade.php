<div class="container px-5 py-24 mx-auto border-t-2 border-zinc-900 border-xl ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Contacto</h2>
        <p class="lg:w-2/3 mx-auto text-slate-200 leading-relaxed text-base">Entendemos la importancia de crear espacios
            que reflejen la visión y las necesidades únicas de cada cliente.</p>
    </div>
    
    @if (session('info'))
    <div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12 mx-auto ">
        <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
    </div>
    @endif

    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg h-full flex items-start">

            <form action="{{route('contac.send')}}" method="POST" class="flex flex-wrap -m-2" autocomplete="off">
                @csrf
                <div class="p-2 w-1/2">
                    <label for="nombre" class="leading-7 text-sm text-slate-200 uppercase">Nombre</label>
                    <input
                    id="nombre"
                    name="nombre"
                        class="w-full bg-secondary-600 bg-opacity-40 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8 "
                        type="text"
                        value="{{ old('nombre') }}"
                        >
                        
                    @error('nombre')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>
                <div class="p-2 w-1/2">
                    <label for="telefono" class="leading-7 text-sm text-slate-200 uppercase">Teléfono</label>
                    <input
                    id="telefono"
                    name="telefono"
                    class="w-full bg-secondary-600 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8"
                    type="text"
                    value="{{ old('telefono') }}"
                        >
                        @error('telefono')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>
                <div class="p-2 w-full">
                    
                    <div class="relative">
                        <label for="mensaje" class="leading-7 text-sm text-slate-200 uppercase">Asunto</label>
                        <textarea name="mensaje" id="mensaje" class="w-full rounded border border-slate-800 h-32 text-base outline-none py-1 px-3 resize-none leading-6">{{ old('mensaje') }}</textarea>
                    </div>

                    @error('mensaje')
                    <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>

                <div class=" mx-auto">
                    {!!htmlFormSnippet()!!}
                    @if ($errors->has('g-recaptcha-response'))

                    <div
                       class="text-red-500 font-semibold">
                            {{$errors->first('g-recaptcha-response')}}
                    </div>
                        
                    @endif
                </div>

                <div class="p-4 w-full">

                    <button type="submit"
                    class="flex mx-auto px-8 py-3 relative rounded group overflow-hidden font-semibold uppercase bg-white text-orange-600"
                    >
                    <span class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-orange-600 group-hover:h-full opacity-90"></span>
                    <span class="relative group-hover:text-white">Enviar</span>
                    
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>