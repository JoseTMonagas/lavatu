@extends('layouts.app')

@section('content')
    <orden-trabajo :items='@json($items)' store-route="{{ route('guardar-ot') }}"></orden-trabajo>
@endsection
