@extends('layouts.app')

@section('contenedor')

<section id="acerca">
    <x-acerca :information="$information" />
</section>

<section id="portfolio">
    <x-proyectos :posts="$posts" />
</section>

<section id="testimonial">
    <div class="p-5">
        <x-clientes :testimonios="$testimonios" />
    </div>
</section>

<section>
    <x-last-project :last="$last" :images="$images" />
</section>

<section id="servicios">
    <x-certificados :services="$services"/>
</section>

<section id="contacto">
    <x-contacto />
</section>


@if(session('info'))
<div class="fixed bottom-0 font-semibold left-0 right-0 bg-green-600 text-white text-center py-4 lg:py-6 px-4">
    {{ session('info') }}
</div>
@endif

@endsection