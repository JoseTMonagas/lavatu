@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Clientes</span>
                    <a
                        class="btn btn-outline-success"
                        href="{{ route("clientes.create") }}">
                        Crear Nuevo
                    </a>
                    <a
                        class="btn btn-outline-info"
                        href="{{ route("clientes.show", 0)  }}">
                        Exportar a Excel
                    </a>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <base-table
                    :headers="[
                              { text: '#', align: 'start', value: 'id' },
                              { text: 'Nombre', value: 'nombre' },
                              { text: 'Telefono', value: 'telefono' },
                              { text: 'Correo', value: 'email' },
                              { text: 'Cliente Frecuente', value: 'cliente_frecuente' },
                              { text: 'Acciones', value: 'actions' }
                              ]"
                    :items='@json($clientes)'></base-table>
            </v-card>
        </div>
    </div>
@endsection
