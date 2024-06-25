@props(['last','images'])
<div>

    <div class="flex flex-col text-center w-full mb-12">
        <h2 class="sm:text-4xl text-2xl font-bold underline decoration-orange-500 decoration-4 underline-offset-8 text-black">Proyecto más reciente</h2>
    </div>
    
    
    <div class="container bg-cover bg-center lg:mx-auto py-44 px-10 lg:px-52" style="background-image: url({{asset('img/latestPro.jpeg')}})" >
        <div class="flex flex-row ">
            <p class="text-white text-2xl font-bold mx-auto uppercase">{{$last->name}}</p>
        </div>
        <div class="grid grid-cols-2 mt-10 ">
            @forelse ($images as $img)
            <div class="col-span-1">
                <div class="bg-cover bg-center h-80" style="background-image: url({{asset($img->image_path )}})">
                    <div class="p-10"></div>
                </div>
            </div>
        @empty
            <div>
                
            </div>
            @endforelse
            
        </div>
    </div>