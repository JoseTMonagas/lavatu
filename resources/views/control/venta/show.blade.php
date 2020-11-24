@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Ventas</span>
                </v-card-title>
                <v-card-text>
                    <div class="d-flex flex-column">
                        <span>
                            <b>Fecha Ingreso:</b>
                            {{ $venta->fecha_ingreso  }}
                        </span>
                        <span>
                            <b>Fecha Venta:</b>
                            {{ $venta->fecha_venta ?? "No ingresado" }}
                        </span>
                        <span>
                            <b>Cliente:</b>
                            {{ $venta->cliente->first()->nombre  }}
                        </span>
                        <span>
                            <b>Forma Pago:</b>
                            {{ $venta->formaPago->nombre ?? "No ingresado"  }}
                        </span>
                        <span>
                            <b>Folio:</b>
                            {{ $venta->folio ?? "No ingresado"  }}
                        </span>
                        <span>
                            <b>Tipo Descuento:</b>
                            @switch($venta->tipo_descuento)
                                @case("PERCENT")
                                    Descuento Porcentual
                                    @break
                                @case("FIXED")
                                    Descuento de Valor Fijo
                                    @break
                                @default
                                    No ingresado
                            @endswitch
                        </span>
                        <span>
                            <b>Descuento:</b>
                            {{ $venta->valorDescuento  }}
                        </span>
                        <span>
                            <b>Observaciones:</b>
                            {{ $venta->observaciones  }}
                        </span>
                        <span class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Precio Unt.</th>
                                        <th>Cantidad</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($venta->tipoServicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->nombre  }}</td>
                                            <td>{{ $servicio->pivot->precio_unitario  }}</td>
                                            <td>{{ $servicio->pivot->cantidad  }}</td>
                                            <td>{{ $servicio->pivot->valor  }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                        <span>
                            <b>Fecha de Creacion:</b>
                            {{ $venta->created_at  }}
                        </span>
                        <span>
                            <b>Fecha de Actualizacion:</b>
                            {{ $venta->updated_at  }}
                        </span>
                    </div>

                </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
