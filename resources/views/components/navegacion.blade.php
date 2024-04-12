<!-- Navbar Start -->
<nav class="flex flex-wrap items-center justify-between p-5 bg-secondary-500">
    <a href="{{ route('posts.home') }}" class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
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
        class="toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 border-t border-primary-500 md:border-none">
        <a href="#destreza"
            class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
            Destrezas
        </a>
        <a href="#portfolio"
            class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
            Proyectos
        </a>
        <a href="#testimonial"
            class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
            Testimonios
        </a>
        <a href="#skills"
        class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
        Certificados
    </a>
        <a href="#contacto"
            class="block md:inline-block text-slate-200 hover:text-orange-500 px-3 py-3 border-b md:border-none uppercase">
            Contacto
        </a>
    </div>
    @auth
    <a href="{{ route('admin.portfolio.index') }}"
        class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-orange-500 hover:bg-secondary-600 hover:text-primary-500 text-white md:rounded">
        Admin
    </a>
    @endauth
    @guest
    <a href="{{ route('admin.portfolio.index') }}"
        class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-orange-500 hover:bg-secondary-600 hover:text-primary-500 text-white md:rounded">
        Log In
    </a>
    @endguest
</nav>