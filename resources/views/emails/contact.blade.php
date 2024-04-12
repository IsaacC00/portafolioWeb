<x-mail::message>
# Nuevo email de Portafolio Web 

<h1>Name: {{$data ['nombre']}}</h1>
<h1>Telefono: {{$data ['telefono']}}</h1>
<h1>Asunto: {{$data ['mensaje']}}</h1>
<x-mail::button :url="''">
    Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
