@props(['services'])
<section class="text-gray-400 body-font container mx-auto mt-40">
    <div class=" px-5 py-10 w-full ">
        <div class="flex flex-col text-center w-full mb-20">
            <h2
                class="sm:text-4xl text-2xl font-bold title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
                Servicios
            </h2>
        </div>

            <!-- Vertical Timeline #2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 items-center justify-center mx-auto">
               
                    @forelse ($services as $row)
                    <div class="relative mx-auto my-auto text-center items-center justify-center flex flex-col mt-6 text-gray-700  ">
                        <div class="p-6 ">
                            <img alt=""
                            src="{{ $row->imagen?  asset('servicios'.'/'.$row->imagen) : asset('servicios'.'/'.'iconService.png') }}"
                            class=" w-14 object-cover mx-auto my-4" />
                          <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-black">
                            {{$row->nombre_servicio}}
                          </h5>
                          <p class="block font-sans text-base antialiased font-light leading-relaxed text-justify">
                            {{$row->desc_servicio}}
                          </p>
                        </div>
               
                      </div> 
                    @empty
                    <div>no hay datos</div>
                    @endforelse
     
            </div>

    </div>
</section>