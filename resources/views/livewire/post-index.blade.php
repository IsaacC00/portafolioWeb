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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-5">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Estatus
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Categorias
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Fecha Creacion
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($posts as $post)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$post->name}}
                                </th>
                                <td class="px-6 py-4">
                                    @if ($post->status == 1)
                                        Publico
                                    @else
                                        En Edicion
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{$post->category->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$post->updated_at->format('Y/m/d')}}
                                </td>
                                <td class="px-6 py-4 ">
                                    
                                    <a href="{{route('admin.portfolio.edit',$post->id)}}" class="text-gray-800">Editar</a>
                                    {{-- delete--}}
                                    <form action="{{route('admin.portfolio.destroy',$post)}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button type="submit" class="text-purple-600"> Eliminar </button>
                                    
                                    </form>
        
                                </td>
                            </tr>
                        
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
                
            </div>
            {{-- TABLA PRINCIPAL --}}
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