@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Ventas</span>
                    <a class="btn btn-info" href="{{ route("ventas.create")  }}">Crear Nuevo</a>
                    <form
                        class="d-flex flex-row align-items-center"
                        method="POST"
                        action="{{ route("ventas.export")  }}">
                        @csrf

                        <input
                            class="form-control mr-3"
                            name="desde"
                            required
                            type="date"/>

                        <button class="btn btn-outline-info">
                            Exportar a Excel
                        </button>
                    </form>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <base-table
                    :headers="[
                              { text: '#', align: 'start', value: 'id' },
                              { text: 'Fecha Ingreso', value: 'fecha_ingreso' },
                              { text: 'Fecha Venta', value: 'fecha_venta' },
                              { text: 'Cliente', value: 'cliente.nombre' },
                              { text: 'Total', value: 'total' },
                              { text: 'Observaciones', value: 'observaciones' },
                              { text: 'Acciones', value: 'actions' }
                              ]"
                    :items='@json($ventas)'></base-table>
            </v-card>
        </div>
    </div>
@endsection
