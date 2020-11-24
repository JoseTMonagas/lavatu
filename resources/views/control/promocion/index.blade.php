@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Promociones</span>
                    <a
                        class="btn btn-outline-success"
                        href="{{ route("promocions.create") }}">
                        Crear Nuevo
                    </a>
                    <a
                        class="btn btn-outline-info"
                        href="{{ route("promocions.show", 0)  }}">
                        Exportar a Excel
                    </a>
            <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <base-table
                    :headers="[
                              { text: '#', align: 'start', value: 'id' },
                              { text: 'Nombre', value: 'nombre' },
                              { text: 'Descripcion', value: 'descripcion' },
                              { text: 'Inicio', value: 'inicio' },
                              { text: 'Fin', value: 'fin' },
                              { text: 'Acciones', value: 'actions' }
                              ]"
                    :items='@json($promociones)'></base-table>
            </v-card>
        </div>
    </div>
@endsection
