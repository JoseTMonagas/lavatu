@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 mx-auto">
            <v-card>
                <v-card-title class="d-flex justify-content-between">
                    <span>{{ $title  }}</span>
                    <a href="{{ $indexRoute  }}">Volver</a>
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
                                    required
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
