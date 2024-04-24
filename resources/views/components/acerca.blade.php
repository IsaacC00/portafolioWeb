@props(['info'])

<div class="container mx-auto flex px-5 py-16 md:flex-row flex-col items-center">

    <div
        class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 border-solid border-[18px] border-black drop-shadow-xl sm:order-1 lg:order-2">
        @if ($information && $information->imagen)
        <!-- Si $information no es null y tiene una imagen, mostrar esta imagen -->
        <img class="" src="{{ asset('perfiles/' . $information->imagen) }}" alt="Imagen perfil" />
        @else
        <!-- Si $information es null o no tiene imagen, mostrar imagen por defecto -->
        <img src="{{ asset('img/person.jpg') }}" alt="Imagen Default">
        @endif
    </div>

    <div
        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:pt-10 pt-8 items-center text-center">

        <h1 class="title-font sm:text-6xl leading-6 text-3xl mb-4 font-bold text-white">
            <span class="text-orange-500">
                Arq.
            </span>
            Ramiro Pantoja
        </h1>
        <p class=" title-font sm:text-3xl text-xl mb-4 font-bold text-white ">
            Construyendo sin limites
        </p>
        <p class="mb-8 leading-relaxed text-slate-200">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Rerum dolorem doloremque nesciunt maiores? Labore minus voluptas,
            adipisci distinctio asperiores doloribus rerum omnis vitae magnam dolores
            assumenda ex temporibus quisquam corporis!
        </p>

        <div class="block space-y-4 lg:flex md:items-start justify-center lg:space-y-0 lg:space-x-4">
            {{-- UBICACION --}}
            <div class=" flex justify-start items-center text-start space-x-4">
                <div
                    class="items-center p-3 justify-center bg-black rounded-lg flex text-white hover:bg-orange-500 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>

                <div class="">
                    <h1 class="text-white text-sm">Ubicación</h1>
                    @if($information)
                    <h1 class="text-white">{{$information->ubicacion}}</h1>
                    @else
                    <h1 class="text-white">Sin Datos</h1>
                    @endif
                </div>
            </div>
            {{-- TELEFONO --}}
            <div class=" flex justify-start items-center text-start space-x-4">
                <div
                    class="items-center p-3 justify-center bg-black rounded-lg flex text-white hover:bg-orange-500 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </div>

                <div class="">
                    <h1 class="text-white text-sm">Teléfono</h1>
                    @if ($information)
                    <h1 class="text-white">{{$information->telefono}}</h1>
                    @else
                    <h1 class="text-white">Sin Datos</h1>
                    @endif
                </div>
            </div>
            {{-- EMAIL --}}
            <div class=" flex justify-start items-center text-start space-x-4">
                <div
                    class="items-center p-2.5 justify-center bg-black rounded-lg flex text-white hover:bg-orange-500 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>

                <div class="">
                    <h1 class="text-white text-sm">Email</h1>
                    @if ($information)
                    <h1 class="text-white">{{$information->email}}</h1>
                    @else
                    <h1 class="text-white">Sin Datos</h1>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>