@extends('layouts.app')

@section('content')
    <div class="container-fluid d-md-none">
        @include('partials/xs-home')
    </div>

    <div class="container-fluid d-none d-block-md">
        @include('partials/lg-home')
    </div>
@endsection
