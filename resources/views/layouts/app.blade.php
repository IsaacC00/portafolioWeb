<!DOCTYPE html>
<html lang="en">

<head class="backdrop-brightness-50">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplicacion Web</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/swiper.js')


    <style>
        .swiper {
            width: 600px;
            height: 300px;
        }
    </style>
</head>

<body class="bg-zinc-800">

    <header class="">
        <x-navegacion />
    </header>

    <div class=" ">

        @yield('contenedor')

        <footer class="bg-zinc-900">
            <div class="px-5 py-6 xl:max-w-maxw m-auto text-center text-slate-400 text-sm">
                Copyrights ©{{ //objeto de fechas de blade para imprimir fechas
                now()->year }} | Todos los Derechos Reservados.
            </div>
        </footer>

    </div>
    <script>
        // Esperar a que el DOM esté listo
        document.addEventListener('DOMContentLoaded', function () {
            // Seleccionar el botón de hamburguesa por su ID
            var hamburger = document.getElementById('hamburger');
            // Seleccionar los elementos del menú que quieres alternar
            var menuItems = document.querySelectorAll('.toggle');
        
            // Función para alternar la visibilidad
            function toggleMenu() {
            menuItems.forEach(function(item) {
                item.classList.toggle('hidden');
            });
            }
        
            // Agregar evento click al botón de hamburguesa
            hamburger.addEventListener('click', toggleMenu);
        });
    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>