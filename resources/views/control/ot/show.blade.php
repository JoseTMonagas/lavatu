<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <b>Lavatu</b>
            </div>
            <div class="col-md">
                <span>{{ date("d/m/Y")  }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Nombre:</th>
                        <td colspan="2">{{ $ordenTrabajo->user->name . " " . $ordenTrabajo->user->surname }}</td>
                    </tr>
                    <tr>
                        <th>Telefono:</th>
                        <td>{{ $ordenTrabajo->user->phone }}</td>
                        <th>Email:</th>
                        <td>{{ $ordenTrabajo->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Direccion:</th>
                        <td>{{ $ordenTrabajo->user->address }}</td>
                        <th>Sector:</th>
                        <td>{{ $ordenTrabajo->user->sector }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Planchado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordenTrabajo->ropas as $ropa)
                            <tr>
                                <td>{{$ropa->name}}</td>
                                <td>{{$ropa->pivot->cantidad}}</td>
                                <td>
                                    @if($ropa->pivot->planchar)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 offset-md-8">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Subtotal por cargas:</th>
                        <td>{{ $ordenTrabajo->subtotalCargas  }}</td>
                    </tr>
                    <tr>
                        <th>Subtotal por planchado:</th>
                        <td>{{ $ordenTrabajo->subtotalPlanchado  }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>{{ $ordenTrabajo->total  }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
