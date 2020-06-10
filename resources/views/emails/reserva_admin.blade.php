@component('mail::message')
# ¡Nueva Reserva!

@component('mail::panel')
    # Datos Cliente
    Nombre: {{ $user->name }}
    Apellido: {{ $user->surname }}
    Correo: {{ $user->email }}
    Telefono: {{ $user->phone }}
@endcomponent

@component('mail::panel')
    # Datos Reserva
    Fecha y Hora: {{ $reserva->hora }}
    Cargas: {{ $reserva->carga }}
    Tipo de Servicio: {{ $reserva->tipo_carga }}
@endcomponent

Muchas Gracias desde,<br>
{{ config('app.name') }}
@endcomponent
