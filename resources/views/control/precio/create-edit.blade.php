@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Precios</span>

                    <a href="{{ route('precios.index')  }}">Volver</a>
                </v-card-title>
                <v-card-text>
                    <form method="POST" action="{{ $submitRoute }}">
                        @csrf
                        @isset($precio)
                        @method("PUT")
                        @endisset

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="tipo_servicio_id">Servicio:</label>
                                <select
                                    class="form-control
                                           @error("tipo_servicio_id")
                                           is-invalid
                                           @enderror"
                                    name="tipo_servicio_id"
                                >
                                    @foreach($servicios as $servicio)
                                        <option
                                            @if(isset($precio) &&
                                                ($precio->tipo_servicio_id == $servicio->id))
                                            selected
                                            @endif
                                            value="{{ $servicio->id }}">{{ $servicio->nombre  }}</option>
                                    @endforeach

                                </select>
                                @error("tipo_servicio_id")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precio">Precio:</label>
                                <input
                                    class="form-control
                                           @error("precio")
                                           is-invalid
                                           @enderror
                                           "
                                    name="precio"
                                    type="text"
                                    @isset($precio)
                                    value="{{ $precio->precio  }}"
                                    @endisset
                                />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="desde">Desde:</label>
                                <input
                                    class="form-control
                                           @error("desde")
                                           is-invalid
                                           @enderror
                                           "
                                    name="desde"
                                    type="date"
                                    @isset($precio)
                                    value="{{ $precio->desde  }}"
                                    @endisset
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hasta">Hasta:</label>
                                <input
                                    class="form-control
                                           @error("hasta")
                                           is-invalid
                                           @enderror
                                           "
                                    name="hasta"
                                    type="date"
                                    @isset($precio)
                                    value="{{ $precio->hasta  }}"
                                    @endisset
                                />
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">
                                <button
                                    type="submit"
                                    class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>

                    </form>
                </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
