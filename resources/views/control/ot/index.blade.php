@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Ordenes de Trabajo</span>
                    <a href="{{ route('mantenimiento.home')  }}">Volver</a>
                </v-card-title>
                <v-card-text>
                    <control-ot
                        get-route="{{ route('ot.getOT') }}"
                        state-update-route="{{ route('ot.stateUpdate') }}"
                    ></control-ot>
                </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
