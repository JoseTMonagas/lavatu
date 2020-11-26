@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Clientes</span>
                    <a href="{{ route('clientes.index')  }}">Volver</a>
                </v-card-title>
                <v-card-text>
                    <form method="POST" action="{{ $submitRoute }}">
                        @csrf
                        @isset($item)
                            @method("PUT")
                        @endisset

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="nombre">Nombre:</label>
                                <input
                                    class="form-control
                                           @error("nombre")
                                            is-invalid
                                           @enderror"
                                    name="nombre"
                                    type="text"
                                    @isset($item)
                                        value="{{ $item->nombre  }}"
                                    @endisset
                                />
                                @error("nombre")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                <input
                                    class="form-control
                                           @error("fecha_nacimiento")
                                            is-invalid
                                           @enderror"
                                    name="fecha_nacimiento"
                                    type="date"
                                    @isset($item)
                                        value="{{ $item->fecha_nacimiento  }}"
                                    @endisset
                                />
                                @error("fecha_nacimiento")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="telefono">Telefono:</label>
                                <input
                                    class="form-control
                                           @error("telefono")
                                            is-invalid
                                           @enderror"
                                    name="telefono"
                                    type="text"
                                    @isset($item)
                                        value="{{ $item->telefono  }}"
                                    @endisset
                                />
                                @error("telefono")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="email">Correo:</label>
                                <input
                                    class="form-control
                                           @error("email")
                                            is-invalid
                                           @enderror"
                                    name="email"
                                    type="email"
                                    @isset($item)
                                        value="{{ $item->email  }}"
                                    @endisset
                                />
                                @error("email")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="sector_id">Sector:</label>
                                <select
                                    name="sector_id"
                                    class="form-control
                                          @error("sector_id")
                                          is-invalid
                                          @enderror
                                          ">

                                    @foreach($sectors as $sector)
                                        <option
                                            @if(isset($item) && $item->sector_id == $sector->id)
                                                selected
                                            @endif
                                            value="{{ $sector->id  }}">
                                            {{ $sector->nombre }}
                                        </option>
                                    @endforeach

                                </select>
                                @error("sector_id")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="direccion">Direccion:</label>
                                <input
                                    class="form-control
                                           @error("direccion")
                                            is-invalid
                                           @enderror"
                                    name="direccion"
                                    type="text"
                                    @isset($item)
                                        value="{{ $item->direccion  }}"
                                    @endisset
                                />
                                @error("direccion")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="cliente_frecuente">Cliente Frecuentes:</label>
                                <input
                                    class="form-control
                                           @error("cliente_frecuente")
                                            is-invalid
                                           @enderror"
                                    name="cliente_frecuente"
                                    value="1"
                                    type="checkbox"
                                    @isset($item)
                                    @if($item->cliente_frecuente)
                                        checked
                                        @endif
                                    @endisset
                                />
                                @error("cliente_frecuente")
                                    <div class="alert alert-danger">
                                        {{ $message  }}
                                    </div>
                                @enderror
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
