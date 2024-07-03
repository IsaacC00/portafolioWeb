@props(['last','images'])
<div class="flex flex-col items-center">

    <div class=" text-center w-full mb-12">
        <h2
            class="sm:text-4xl text-2xl font-bold underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
            Proyecto más reciente</h2>
    </div>

    <divo class="container bg-cover bg-center  bg-fixed cursor-pointer"
        style="background-image: url({{asset('img/latestPro.png')}})"
        onclick="window.location.href='{{ route('home.show',$last->id)}}'">
        <div class="bg-black bg-opacity-50 lg:mx-auto py-44 px-10 lg:px-52 ">

            <div class="flex flex-row ">
                <p class="text-white text-2xl font-bold mx-auto uppercase text-center ">{{$last ? $last->name : 'none'
                    }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-10 ">
                @forelse ($images as $img)
                <div class="col-span-1 group relative items-center justify-center overflow-hidden cursor-pointer">
                    <div class="h-full w-full">
                        <div class="bg-cover bg-center h-80 group-hover:scale-125 duration-500" style="background-image: url({{asset($img->image_path )}})">
                            <div class="p-20"></div>
                        </div>
                    </div>
                </div>
                @empty
                <div>
                    no existen fotos
                </div>
                @endforelse

            </div>
        </div>

    </divo>
</div>