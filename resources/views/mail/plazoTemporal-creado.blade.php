@component('mail::message')
#Hola {{ $user->name }}

Se a creado un Plazo Temporal llamado **{{$nombre}}**,
para colocar la observacion necesaria y ser cumplida.

Gracias,<br>
{{ config('app.name') }}
@endcomponent