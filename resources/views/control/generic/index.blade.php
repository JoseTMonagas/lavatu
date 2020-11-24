@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>{{ $title  }}</span>
                    <a
                        class="btn btn-outline-success"
                        href="{{ $createRoute }}">
                        Crear Nuevo
                    </a>
                    <a
                        class="btn btn-outline-info"
                        href="{{ $exportRoute  }}">
                        Exportar a Excel
                    </a>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <base-table
                    :headers="[
                              { text: '#', align: 'start', value: 'id' },
                              { text: 'Nombre', value: 'nombre' },
                              { text: 'Acciones', value: 'actions' }
                              ]"
                    :items='@json($items)'></base-table>
            </v-card>
        </div>
    </div>
@endsection
