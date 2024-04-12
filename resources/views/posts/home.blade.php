@extends('layouts.app')

@section('contenedor')

<section>
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

<section id="skills">
    <x-certificados :certificados="$certificados" />
</section>

<section id="contacto">
    <x-contacto />
</section>

@endsection