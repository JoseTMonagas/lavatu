@extends('layouts.app')
@section('content')
    <modulo-venta
        cliente-list="{{ route("clientes.list")  }}"
        cliente-store="{{ route("clientes.json-store")  }}"
        venta-store="{{ route("ventas.store")  }}"
        :servicios='@json($servicios)'
        :formas-pago='@json($formasPago)'
        return-route="{{ route('ventas.index')  }}"
        @isset($venta)
        :edit-item='@json($venta)'
        venta-update="{{ route("ventas.update", $venta)  }}"
        @endisset
    ></modulo-venta>
@endsection
