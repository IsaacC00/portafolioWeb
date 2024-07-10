<nav class="flex flex-wrap items-center justify-between p-5 bg-black">
    <a href="{{ route('home.index') }}" class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
        <span class="ml-3 w-32 text-xl">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </span>
    </a>
    <div class="flex md:hidden">
        <button id="hamburger">
            <img class="toggle block" src="{{ asset('img/menu-squared.png') }}" alt="menu icon" width="40" height="40">
            <img class="toggle hidden" src="{{ asset('img/close-window.png') }}" alt="close icon" width="40"
                height="40">
        </button>
    </div>
    <div
        class=" toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 border-t border-primary-500 md:border-none">

                <a href="{{route('home.index')}}"
                    class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
                    Inicio
                </a>

                <a href="{{route('home.post')}}"
                class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
                General
                </a>

                @forelse ($category->slice(1) as $cat)
                <div class="lg:relative lg:flex lg:flex-row">
                    <a href="{{route('home.category',$cat->slug)}}"
                        class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
                        {{$cat->name}}
                    </a>
                </div>
                @empty
                <a href="#"
                    class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
                    Sin Categorías
                </a>
                @endforelse

    </div>
</nav>