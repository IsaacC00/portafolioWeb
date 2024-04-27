<x-mail::message>
# Nuevo email de Portafolio Web 

<h1>Nombre: {{$data ['nombre']}}</h1>
<h1>Teléfono: {{$data ['telefono']}}</h1>
<h1>Asunto: {{$data ['mensaje']}}</h1>

Realizado con<br>
{{ config('app.name') }}
</x-mail::message>
