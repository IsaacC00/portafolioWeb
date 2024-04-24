@props(['post'])

<div class="xl:w-1/3 md:w-1/2 p-4"><a href="{{ route('home.show',$post)}}"">
        <div class="bg-zinc-900 bg-opacity-40 p-6 rounded-lg">
            <div class="relative h-40 rounded bg-cover bg-center mb-6 hover:scale-105 duration-500"
                style="background-image: url('{{ asset($post->images->first()->image_path) }}')">
            </div>
            <h1 class="text-lg text-slate-200 font-semibold mb-4">{{$post->name}}</h1>
            <p class="leading-relaxed text-slate-200 text-base">
                {{$post->extract}}
            </p>
        </div>
    </a>
</div>