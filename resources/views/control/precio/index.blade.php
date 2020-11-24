@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Precios</span>
                    <a
                        class="btn btn-outline-success"
                        href="{{ route("precios.create") }}">
                        Crear Nuevo
                    </a>
                    <a
                        class="btn btn-outline-info"
                        href="{{ route("precios.show", 0)  }}">
                        Exportar a Excel
                    </a>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <base-table
                    :headers="[
                              { text: '#', align: 'start', value: 'id' },
                              { text: 'Servicio', value: 'tipo_servicio.nombre' },
                              { text: 'Precio', value: 'precio' },
                              { text: 'Desde', value: 'desde' },
                              { text: 'Hasta', value: 'hasta' },
                              { text: 'Acciones', value: 'actions' }
                              ]"
                    :items='@json($precios)'></base-table>
            </v-card>
        </div>
    </div>
@endsection
