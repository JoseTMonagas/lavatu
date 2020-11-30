@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Ordenes de Trabajo</span>
                    <a href="{{ route('ordenes.show', $ordenTrabajo)  }}">Exportar PDF</a>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <editar-ot
                    route="{{ route("ordenes.update", $ordenTrabajo) }}"
                    :ropas='@json($ropas)'
                    :orden-trabajo='@json($ordenTrabajo)'></editar-ot>
            </v-card>
        </div>
    </div>
@endsection
