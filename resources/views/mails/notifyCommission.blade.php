@component('mail::message')
<h1>Comisión Registrada Exitosamente</h1>

¡Hola, {{ $commission->user->name }}! tu comisión '{{ $commission->title }}' fue registrada exitosamente en nuestro sistema :D

@component('mail::panel')
Recuerda, el precio de tu comisión es de ${{ $commission->price }}, puedes consultar todos los detalles en el botón anexo.
@endcomponent

@component('mail::button', ['url' => route('commission.show', $commission)])
Ver comisión 
@endcomponent

Muchas gracias, <br>
{{ config('app.name') }}
@endcomponent