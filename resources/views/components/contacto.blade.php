<div class="container px-5 py-24 mx-auto border-t-2 border-zinc-900 border-xl ">
    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Contacto</h2>
        <p class="lg:w-2/3 mx-auto text-slate-200 leading-relaxed text-base">Entendemos la importancia de crear espacios
            que reflejen la visión y las necesidades únicas de cada cliente.</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg h-full flex items-start">

            <form action="{{route('contac.send')}}" method="POST" class="flex flex-wrap -m-2">
                @csrf
                <div class="p-2 w-1/2">
                    <label for="nombre" class="leading-7 text-sm text-slate-200 uppercase">Nombre</label>
                    <input
                    id="nombre"
                    name="nombre"
                        class="w-full bg-secondary-600 bg-opacity-40 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8 "
                        type="text">
                    @error('nombre')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>
                <div class="p-2 w-1/2">
                    <label for="telefono" class="leading-7 text-sm text-slate-200 uppercase">Telefono</label>
                    <input
                    id="telefono"
                    name="telefono"
                        class="w-full bg-secondary-600 rounded border border-slate-800 text-base outline-none py-1 px-3 leading-8"
                        type="text">
                        @error('telefono')
                        <span class="text-red-500 font-semibold">{{$message}}</span>
                    @enderror
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="mensaje" class="leading-7 text-sm text-slate-200 uppercase">Asunto</label>
                        <textarea name="mensaje" id="mensaje"
                            class="w-full rounded border border-slate-800 h-32 text-base outline-none py-1 px-3 resize-none leading-6"></textarea>
                    </div>
                    @error('mensaje')
                    <span class="text-red-500 font-semibold">{{$message}}</span>
                @enderror
                </div>
                <div class="p-4 w-full">

                    <button type="submit"
                    class="flex mx-auto text-white bg-orange-600 hover:bg-black hover:text-slate-200 border-lg font-semibold py-4 px-10 focus:outline-nonerounded text-base uppercase"
                    >
                        Enviar
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>