@extends('layouts.app')

@section('content')
        <div class="col-md-6 mx-auto">

            <v-card>
                <v-card-title class="d-flex flex-row justify-content-between">
                    Orden de Trabajo
                    <a class="" href="{{ route('home')  }}">Volver</a>
                </v-card-title>
                <v-card-text>
                    <span class="mr-2"><b>Nº Orden: </b>{{ $ordenTrabajo->id  }}</span>
                    <span><b>Fecha: </b>{{ $ordenTrabajo->created_at  }}</span>
                </v-card-text>
                <v-card-text>
                    Las posibles causas de este rechazo son:
                    <ul>
                        <li>Error en el ingreso de los datos de su tarjeta de Crédito o Débito (fecha y/o código de seguridad).</li>
                        <li>Su tarjeta de Crédito o Débito no cuenta con saldo suficiente.</li>
                        <li>Tarjeta aún no habilitada en el sistema financiero.</li>
                    </ul>
                </v-card-text>
            </v-card>
        </div>
@endsection
