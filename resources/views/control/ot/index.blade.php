@extends('layouts.app')
@section('content')
    <v-card>
        <v-card-title class="d-flex justify-content-between">
            <span>Ordenes de Trabajo</span>
        </v-card-title>
        <base-table :headers="[
            { text: '#', align: 'start', value: 'id' },
            { text: 'Acciones', value: 'actions' }
            ]" :items='@json($ordenes)'></base-table>
    </v-card>
@endsection
