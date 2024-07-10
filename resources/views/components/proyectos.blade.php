@props(['posts'])

<div class="container px-5 py-20 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
        <h2
        class="sm:text-4xl text-2xl font-bold underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
        Proyectos</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 items-center justify-center">
        
        @forelse ($posts as $post)
        <div>
            <div class="group relative items-center justify-center overflow-hidden cursor-pointer hover:shadow-xl hover:shadow-black/30 transition-shadow" >
                <div class="h-full w-full" >
                    <img class="h-full w-full object-cover group-hover:scale-125 duration-500 " src="{{  asset($post->images->first()->image_path ) }}" alt="">
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70 "></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-9 text-center translate-y-[60%] group-hover:translate-y-0 transition-all ">
                    <h1 class="text-2xl text-white font-bold mb-28">Proyecto {{ $post->category->name.' : '.$post->name}}</h1>
                    <p class="text-lg italic text-white mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{substr ($post->body, 0 , 120)}}...</p>
                    <a class="rounded-full shadow shadow-black/60 bg-orange-700 py-2 px-3.5 text-sm capitalize text-white " href="{{ route('home.show',$post)}}">Ver proyecto </a>
                </div>         
            </div>
        </div>
        @empty  
            <div>
                <p>No existen proyectos</p>
            </div>
        @endforelse
            
    </div>
    
    <div class="text-center items-center justify-center mt-10 text-lg">
        <a href="{{route('home.post')}}" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-black transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-white group">
            <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-orange-500 group-hover:h-full"></span>
            <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </span>
            <span class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </span>
            <span class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Más proyectos</span>
            </a>
    </div>

    <div class="flex flex-col text-center w-full my-20">
        <h2
        class="sm:text-4xl text-2xl font-bold underline decoration-orange-500 decoration-4 underline-offset-8 text-black">
        Compromiso y Excelencia: Proyecto Insignia
    </h2>
    </div>

    {{-- video --}}
    <div class="my-24" style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/916931339?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="PROYECTO RESIDENCIAL - FAMILIA PROAÑO CORDOVA"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
    {{-- video --}}
    
</div>
