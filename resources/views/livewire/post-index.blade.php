<div>
    <div class="my-8  flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between " >
        {{-- BUSCADOR --}}
        <div class="py-2.5  flex items-center space-x-2">
        
            <input  wire:model.live="search" class=" py-2 ps-3 w-80 text-sm text-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Proyecto">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"  fill="currentColor" >
                <path d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
            </svg>
        </div>
    </div>
        {{-- BUSCADOR --}}
        
        {{-- TABLA MAIN --}}
            
        <div>

        @if ($posts->count())
            {{-- TABLA PRINCIPAL --}}
            <div class="my-6 ">
                <div class=" overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="font-semibold w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-5">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Estatus
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Categoría
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Fecha Creación 
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($posts as $row)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$row->name}}
                                </th>
                                <td class="px-6 py-4">
                                    @if ($row->status == 2)
                                    <a href="{{route('home.show',$row->id)}}" target="_blank" class="text-green-600">Publicado</a>
                                    
                                    @else
                                        En Edición 
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{$row->category->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$row->updated_at->format('Y/m/d')}}
                                </td>
                                <td class="px-6 py-4 flex flex-col items-start">
                                    
                                    <a href="{{route('admin.posts.edit',$row)}}" class="text-blue-800">Editar</a>
                                    <button type="submit" class="text-red-600" onclick="showDialog({{$row->id}})" > Eliminar </button>
                                    {{-- delete--}}
                                    <div id="dialog-{{ $row->id }}"
                                        class="hidden fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center z-10">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Está seguro
                                                         que desea eliminar
                                                        este proyecto? : {{$row->category->name}} <br> {{$row->name}} id: {{$row->id}}
                                                    </h3>
                                                    <div class=" flex flex-row items-center justify-center">
                                                        <form action="{{route('admin.posts.destroy',$row->id)}}" method="POST">
                
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Si, Deseo Eliminar
                                                            </button>
                                                        </form>
                
                                                        <button type="button" onclick="removeDialog({{$row->id}})"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- delete--}}
                                </td>
                            </tr>
                        
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
                
            </div>
            {{-- TABLA PRINCIPAL --}}

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

            <div class="mx-5 my-4 relative ">
                {{ $posts->withQueryString()->links()}}
            </div>
        @else
            <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-xl my-6">
                <h1>No Encontrado</h1>
            </div>
        @endif
            
        </div>

        {{-- TABLA MAIN --}}
    </div>
</div>