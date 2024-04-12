@props(['certificados'])
<section class="text-gray-400 body-font">
    <div class="container px-5 py-24 mx-auto border-t-2 border-zinc-900">
        <div class="flex flex-wrap -mx-4 -my-8">
            <div class="flex flex-col text-center w-full mb-20">
                <h2
                    class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-slate-200">
                    Certificados
                </h2>
            </div>

            @forelse ($certificados as $row)
            <div class="py-8 px-4 lg:w-1/3">
                <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg h-full flex items-start">
                    <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                        <span class="text-gray-400 pb-2 mb-2 border-b-2 border-orange-700">
                            {{ $row->fecha_certificado->format('M') }}
                        </span>
                        <span class="font-medium text-lg leading-none text-gray-300 title-font">
                            {{ $row->fecha_certificado->format('Y') }}
                        </span>
                    </div>
                    <div class="flex-grow pl-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-orange-500 mb-1 uppercase">
                            {{$row->tipo_certificado}}
                        </h2>
                        <h3 class="title-font text-xl font-medium text-white mb-3">
                            {{$row->inst_certificado}}
                        </h3>
                        <p class="leading-relaxed mb-5 text-justify">
                            {{substr ($row->desc_certificado, 0 , 120) }}  
                        </p>
                        {{-- <a class="mt-3 text-primary-500 inline-flex items-center">Read more
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a> --}}
                    </div>
                </div>
            </div>
            @empty
            <div>
                <p>No hay certificados por mostrar</p>
            </div>
            @endforelse

        </div>
    </div>
</section>