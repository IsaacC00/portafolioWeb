@props(['posts'])

<div class="container px-5 py-24 mx-auto border-t-2 border-zinc-900">
    <div class="flex flex-col text-center w-full mb-20">
        <h2
        class="sm:text-4xl text-2xl font-medium title-font underline decoration-orange-500 decoration-4 underline-offset-8 text-white">
        Portfolio</h2>
    </div>
    <div class="flex flex-wrap ">
        
        @forelse ($posts as $post)
            
        <div class="xl:w-1/3 md:w-1/2 p-4"><a href="{{ route('home.show',$post)}}"">
            <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg">
                <div class="relative h-40 rounded bg-cover bg-center mb-6 hover:scale-105 duration-500"
                    style="background-image: url('{{ asset($post->images->first()->image_path) }}');">
                </div>
                        <h1 class="text-lg text-slate-200 font-semibold mb-4">{!! $post->name !!}</h1>
                        <p class="leading-relaxed text-slate-200 text-base">
                            {!! substr ($post->extract, 0 , 120) !!}  
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <div>
                <p> No existen proyectos</p>
            </div>
        @endforelse
            
    </div>
    
    <div class="flex items-center justify-center text-orange-500 mt-5 font-semibold text-base">
        <a href="{{route('home.post')}}">Mas Proyectos >></a >
    </div>
</div>
