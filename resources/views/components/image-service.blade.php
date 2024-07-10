@props(['service'])
<div class="my-5">
    @if ($service->imagen)
    <div class="flex flex-col justify-start">

        <div class=" border border-slate-200 w-28">
            <img id="preview" src="{{ asset('servicios').'/'.$service->imagen}}" class="h-auto mx-auto my-6"
                alt="{{$service->nombre_servicio}}">
        </div>

        <a type="submit" class="text-red-600 cursor-pointer mt-5 " onclick="showDialog({{$service->id}})"> Eliminar
            Imagen
        </a>
        {{-- delete--}}
        <div id="dialog-{{ $service->id }}"
            class="hidden fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Está seguro de que desea
                            eliminar la imagen del servicio: {{$service->nombre_servicio}} ?
                        </h3>
                        <div class=" flex flex-row items-center justify-center">

                            <a href="{{route('image.delete.service',$service->id)}}"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center cursor-pointer">
                                Si, Deseo Eliminar
                            </a>

                            <button type="button" onclick="removeDialog({{$service->id}})"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- delete--}}
    </div>
    @else
    <div class="flex flex-col justify-start">
        <div class="border border-slate-200 w-28">
            <img id="preview"  src="{{ asset('servicios'.'/'.'iconService.png') }}" class="h-auto mx-auto my-6"
                alt="{{$service->nombre_servicio}}">
        </div>
    </div>
    @endif
    <script>
        function showDialog(id){
            let dialog = document.getElementById(`dialog-${id}`);
            dialog.classList.remove("hidden")
            dialog.classList.remove("opacity-10")
            
        }
    
        function removeDialog(id){
            let dialog = document.getElementById(`dialog-${id}`);
            dialog.classList.add("hidden")
            
        }
    
    </script>
</div>