@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title
                    class="d-flex flex-row justify-content-between">
                    <span>
                        Hola, {{ \Auth::user()->name }}
                    </span>

                    <a href="{{ route('home')  }}">Salir</a>
                </v-card-title>
            <v-card-text>
                <v-divider></v-divider>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('clientes.index')}}">
                    Clientes
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('forma-pagos.index')}}">
                    Formas de Pago
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    href="{{route('tipo-servicios.index')}}">
                    Tipos de Servicio
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('promocions.index')}}">
                    Promociones
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('precios.index')}}">
                    Precios
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('ventas.index')}}">
                    Ventas
                </v-btn>
                <v-btn
                    x-large
                    depressed
                    class="my-2"
                    href="{{route('ot.index')}}">
                    Ordenes de Trabajo
                </v-btn>
                <v-divider></v-divider>
            </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
