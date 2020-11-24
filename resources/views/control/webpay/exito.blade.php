@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <v-card>
                <v-card-title class="d-flex flex-row justify-content-between">
                    Orden de Trabajo
                    <a class="" href="{{ route('home')  }}">Volver</a>
                </v-card-title>
            <v-card-text>
                <span class="mr-2"><b>Nº Orden: </b>{{ $result["buyOrder"]  }}</span>
                <span><b>Fecha: </b>{{ $ordenTrabajo->created_at  }}</span>
            </v-card-text>
            <v-card-text>
                <span class="mr-2"><b>Nº Comercio: </b>{{ $result["commerceCode"]  }}</span>
                <span><b>Codigo Autorizacion: </b>{{ $result["authorizationCode"]  }}</span>
            </v-card-text>
            <v-card-text>
                <span><b>Tipo de pago: </b>{{ $result["paymentTypeCode"]  }}</span>
            </v-card-text>
            <v-card-text>
                <span><b>Monto Total: </b>{{ $result["amount"]  }}</span>
            </v-card-text>
            <v-card-actions>
                <v-btn outlined raised href="{{ route("home") }}">Volver al Inicio</v-btn>
            </v-card-actions>
        </v-card>
    </div>
@endsection
