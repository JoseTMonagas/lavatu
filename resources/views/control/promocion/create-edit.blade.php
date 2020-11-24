@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>Promociones</span>
                    <a href="{{ route('promocions.index')  }}">Volver</a>
                </v-card-title>
                <v-card-text>
                    <form method="POST" action="{{ $submitRoute }}" enctype="multipart/form-data">
                        @csrf
                        @isset($promocion)
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
                                    required
                                    type="text"
                                    @isset($promocion)
                                    value="{{ $promocion->nombre  }}"
                                    @endisset
                                />
                                @error("nombre")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input
                                    class="form-control
                                           @error("descripcion")
                                           is-invalid
                                           @enderror"
                                    name="descripcion"
                                    required
                                    type="text"
                                    @isset($promocion)
                                    value="{{ $promocion->descripcion  }}"
                                    @endisset
                                />
                                @error("descripcion")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="inicio">Inicio:</label>
                                <input
                                    class="form-control
                                           @error("inicio")
                                           is-invalid
                                           @enderror
                                           "
                                    name="inicio"
                                    type="date"
                                    @isset($promocion)
                                    value="{{ $promocion->inicio  }}"
                                    @endisset
                                />
                                @error("inicio")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="fin">Fin:</label>
                                <input
                                    class="form-control
                                           @error("fin")
                                           is-invalid
                                           @enderror
                                           "
                                    name="fin"
                                    type="date"
                                    @isset($promocion)
                                    value="{{ $promocion->fin  }}"
                                    @endisset
                                />
                                @error("fin")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="img">Imagen:</label>
                                <input
                                    class="form-control
                                           @error("img")
                                           is-invalid
                                           @enderror
                                           "
                                    type="file"
                                    name="img"/>
                                @error("img")
                                <div class="alert alert-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                                @isset($promocion)
                                <img
                                    src="{{ asset($promocion->img) }}"
                                    class="img-fluid"/>
                                @endisset
                            </div>

                            <div class="form-group col-md-6">
                                <label for="dia_semana_id">Dias Activo:</label>
                                <select
                                    class="form-control
                                           @error("dia_semana_id")
                                           is-invalid
                                           @enderror
                                           "
                                    name="dia_semana_id[]"
                                    multiple
                                >
                                    @foreach($dias as $dia)
                                        <option
                                            @isset($promocion)
                                                @if($promocion->diasSemana->contains($dia))
                                                    selected
                                                @endif
                                            @endisset
                                            value="{{ $dia->id  }}">
                                            {{ ucfirst(strtolower($dia->nombre)) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("dia_semana_id")
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
