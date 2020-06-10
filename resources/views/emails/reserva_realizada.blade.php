@component('mail::message')
# ¡Tu Reserva fue realizada exitosamente!

@component('mail::panel')
    {{ $hora }}
@endcomponent

<img alt="Reglamentos de Uso" src="{{ asset('img/5.jpg') }}"/>

Muchas Gracias desde,<br>
{{ config('app.name') }}
@endcomponent
