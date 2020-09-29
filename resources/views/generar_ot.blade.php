@extends('layouts.app')

@section('content')
    <orden-trabajo
        :items='@json($items)'
        :user='@json($user)'
        store-route="{{ route('guardar-ot') }}"
    >
        <template v-slot:header>
            <div class="d-flex flex-row">
                Hola, {{ \Auth::user()->name  }}.
                <form method="POST" action="{{ route('logout') }}" class="ml-md-3">
                    @csrf

                    <button type="submit" class="btn btn-warning">Salir</button>
                </form>
            </div>
        </template>
        <template v-slot:footer>
            <img
                src="{{ asset('img/CUIDADOS-01.png') }}"
                alt=""
                class="img-fluid" />
        </template>
    </orden-trabajo>

@endsection
