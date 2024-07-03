@extends('layouts.back')

@section('cuerpo')

<h1 class="text-4xl font-bold">Lista de Testimonios</h1>

@if (session('info'))
<div class="bg-green-600 rounded-lg my-3 sm:w-6/12 lg:w-4/12">
    <h1 class="text-white text-base font-semibold p-2 text-center">{{session('info')}}</h1>
</div>
@endif

<div class="my-6">
    <a href="{{route('admin.testimonials.create')}}"
        class="font-bold bg-purple-600 rounded-md text-sm text-white p-2.5">
        Agregar Testimonio
    </a>
</div>
{{-- crud--}}

<div class=" overflow-x-auto my-8">
    <table class="font-semibold w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-5">
                    Nombre testimonio
                </th>
                <th scope="col" class="px-6 py-5">
                    Cargo testimonio
                </th>
                <th scope="col" class="px-6 py-5">
                    Imagen testimonio
                </th>
                <th scope="col" class="px-6 py-5">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($testimonials as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td class="px-6 py-4">
                    {{$row->nombre_testimonio ? $row->nombre_testimonio : 'Anónimo'}}
                </td>

                <td class="px-6 py-4">
                    {{$row->cargo_testimonio ? $row->cargo_testimonio : substr($row->testimonio, 0 ,70 )}}
                </td>

                <th scope="row" class="px-6 py-4 justify-center items-center">
                    <img alt=""
                        src="{{ $row->imagen?  asset('clientes'.'/'.$row->imagen) : asset('clientes'.'/'.'nonUser.png') }}"
                        class="size-8 rounded-full object-cover" />
                </th>

                <td class="px-6 py-4 flex flex-col lg:flex-row  items-center">
                    <a href="{{route('admin.testimonials.edit',$row->id)}}" class="text-blue-800 pr-4">Editar</a>
                    <button type="submit" class="text-red-600" onclick="showDialog({{$row->id}})"> Eliminar </button>
                    {{-- delete--}}
                    <div id="dialog-{{ $row->id }}"
                        class="hidden fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center">
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
                                        este testimonio? : {{$row->nombre_testimonio ? $row->nombre_testimonio : 'Anónimo'}} <br> {{$row->cargo_testimonio ? $row->cargo_testimonio : substr($row->testimonio, 0 ,70 ) }}
                                    </h3>
                                    <div class=" flex flex-row items-center justify-center">
                                        <form action="{{route('admin.testimonials.destroy',$row->id)}}" method="POST" >
 
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
            @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th class=" p-4 items-center">
                    <p>No hay datos</p>
                </th>
                <th class=" p-4 items-center">
                    <p>No hay datos</p>
                </th>
                <th class=" p-4 items-center">
                    <p>No hay datos</p>
                </th>
                <th class=" p-4 items-center">
                    <p>No hay datos</p>
                </th>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

{{-- crud--}}

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
    {{$testimonials->links()}}
</div>

@endsection