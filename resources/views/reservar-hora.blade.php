@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <reserva-hora email="{{ \Auth::user()->email }}" available-route="{{ route('revisarDisponibilidad') }}" reserva-route="{{ route('hacerReserva') }}" home-route="{{ route('home') }}"></reserva-hora>
        </div>
    </div>
</div>
@endsection
