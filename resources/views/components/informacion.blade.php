@props(['information'])
<div class="my-6">
    @forelse ($information as $row)
    <div class="overflow-x-auto my-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-5">
                        Telefono
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Twitter(X)
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Facebook
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Instagram
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Acciones
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @forelse ($information as $info)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$info->telefono}}
                        </td>
                        <td class="px-6 py-4">
                            {{$info->facebook}}
                        </td>
                        <td class="px-6 py-4">
                            {{$info->instagram}}
                        </td>
                        <td class="px-6 py-4">
                            {{$info->twitter}}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('perfiles').'/'.$info->imagen }}"  width="30">
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('admin.user.edit',$info->id)}}" class="text-blue-800">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            Sin datos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @empty
    <a href="{{ route('admin.user.index') }}" class="bg-purple-600  hover:bg-purple-800 transition-colors cursor-pointer
       text-base font-bold px-8 py-2.5 text-white rounded-lg">
        Agregar Informacion
    </a >
    @endforelse
</div>