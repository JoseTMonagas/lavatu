@extends('layouts.app')
@section('content')
    <v-card>
        <v-card-title class="d-flex justify-content-between">
            <span>Usuarios</span>
        </v-card-title>
        <base-table :headers="[
            { text: '#', align: 'start', value: 'id' },
            { text: 'Nombre', value: 'nombre' },
            { text: 'Telefono', value: 'phone' },
            { text: 'Estado', value: 'state' }
            ]" :items='@json($usuarios)'></base-table>
    </v-card>
@endsection
