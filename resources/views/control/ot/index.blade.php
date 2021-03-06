@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Ordenes de Trabajo</span>
                    <a href="{{ route('ordenes.index')  }}">Volver</a>
                </v-card-title>
                <control-ot
                    get-route="{{ route('ot.getOT') }}"
                ></control-ot>
            </v-card>
        </div>
    </div>
@endsection
