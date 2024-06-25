@props(['info'])

<div class="">

    <div class=" h-full w-full bg-black">
        <img class="pt-24" src="{{asset('img/banner-superio-web.gif')}}" alt="">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="col-span-1 bg-zinc-700">

            <p class=" sm:text-2xl text-4xl p-10 text-center font-bold text-white ">
                <span id="element"></span>
            </p>

        </div>
        <div class="col-span-1 bg-orange-500 flex flex-col">
            <p class=" font-semibold text-base text-white text-center p-5 ">
            @if($information)
                {{ $information->descripcion}}
                @else
                no existe informacion
                @endif
            </p>    
        </div>
    </div>
    {{--
    <div
        class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 border-solid border-[18px] border-black drop-shadow-xl sm:order-1 lg:order-2">
        {{-- @if ($information && $information->imagen)
        <!-- Si $information no es null y tiene una imagen, mostrar esta imagen -->
        <img class="" src="{{ asset('perfiles/' . $information->imagen) }}" alt="Imagen perfil" />
        @else
        <!-- Si $information es null o no tiene imagen, mostrar imagen por defecto -->
        <img src="{{ asset('img/person.jpg') }}" alt="Imagen Default">
        @endif
    </div> --}}
    {{--
    <div
        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:pt-10 pt-8 items-center text-center">

        <h1 class="title-font sm:text-6xl leading-6 text-3xl mb-4 font-bold text-white">
            <span class="text-orange-500">
                Arq.
            </span>
            Ramiro Pantoja
        </h1>
        <p class=" title-font sm:text-3xl text-xl mb-4 font-bold text-white ">
            <span id="element"></span>
        </p>
        <p class="mb-8 text-slate-200">
            @if($information)
            {{ $information->descripcion}}

            @else
            no ha informacion

            @endif
        </p>

    </div> --}}


    <div class="grid grid-cols-1 lg:grid-cols-2 flex-row justify-center items-center px-10 lg:px-28 my-16">
        <div class="col-span-1 ">
            <img class="" src="{{asset('img/proceso-arquitectura.gif')}}" alt="">
        </div>
        <div class="col-span-1 ">
            <h1 class=" text-2xl lg:text-3xl font-bold lg:mx-auto my-8">
                ¿Qué es proyecto
                LLAVE EN MANO ?
            </h1>
            <div class="text-base text-justify lg:text-lg text-zinc-600">
                <p class="">
                    Un proyecto llave en mano representa un enfoque integral que abarca desde la concepción inicial
                    hasta su
                    culminación. Analizamos meticulosamente cada necesidad, desde la ingeniería y arquitectura
                    conceptual
                    hasta los detalles de construcción y las pruebas finales de implementación. Nos comprometemos con
                    acabados de primera calidad y la entrega de resultados excepcionales.
                </p>
                <br>
                <p>
                    Nuestro objetivo primordial es la satisfacción absoluta de nuestros clientes. Trabajamos para
                    optimizar
                    recursos y tiempo, garantizando construcciones estéticas, funcionales y, sobre todo, ofreciendo
                    total
                    garantía en cada proyecto.
                </p>
            </div>
        </div>
    </div>


    <div
        class="fixed bottom-4 right-4 z-20 rounded-full py-4 px-4 text-white group  text-center  shadow-lg bg-green-600 overflow-hidden">
        <span
            class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-white top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>

        <span class="relative text-white transition duration-300 group-hover:text-green-600  ease">
            <a target="_blank"
                href="https://api.whatsapp.com/send?phone=+54{{ $information ? $information->telefono : '0000000000' }}}&text=Estoy+interesado%2Fa+en+obtener+una+cotizaci%C3%B3n+para+un+proyecto.+Agradecer%C3%ADa+que+me+contacte+a+su+conveniencia+para+discutir+los+detalles+y+servicios+relacionados.">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg>
            </a>
        </span>
    </div>

</div>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed('#element', {
      strings: ['Diseñando el Futuro', 'Creando Espacios Únicos', 'Arquitectura sin Fronteras', 'Construyendo sin limites'],
      typeSpeed: 50,
      loop: true,
      loopCount: Infinity,
    });
</script>1