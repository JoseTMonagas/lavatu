@extends('layouts.app')
@section('content')
    <v-card>
        <v-card-title class="d-flex justify-content-between">
            <span>Ordenes de Trabajo</span>
        </v-card-title>
        <v-card-text>
            <control-ot
                get-route="{{ route('ot.getOT') }}"
                state-update-route="{{ route('ot.stateUpdate') }}"
            ></control-ot>
        </v-card-text>
    </v-card>
@endsection
