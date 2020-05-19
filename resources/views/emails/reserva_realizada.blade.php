@component('mail::message')
# ¡Tu Reserva fue realizada exitosamente!

@component('mail::panel')
    {{ $datetime }}
@endcomponent

<img alt="Reglamentos de Uso" src="{{ asset('img/5') }}"/>

Muchas Gracias desde,<br>
{{ config('app.name') }}
@endcomponent
