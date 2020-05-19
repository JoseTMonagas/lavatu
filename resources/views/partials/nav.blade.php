<nav class="row container d-md-none sticky">
    <div>
        <div class="col-md">
            <div class="card border border-primary static">
                <div class="card-body bg-info rounded shadow d-flex flex-row justify-content-between align-items-baseline">
                    <div class="text-center">
                        <v-menu offset-y>
                            <template v-slot:activator="{ on }">
                                <v-btn color="primary" dark v-on="on">
                                    <v-icon>
                                        mdi-menu
                                    </v-icon>
                                </v-btn>
                            </template>
                            <v-list class="pt-5">
                                <v-list-item>
                                    <v-list-item-title><a href="#servicio">@lang("menu.servicio")</a></v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title><a href="#nosotros">@lang("menu.conocenos")</a></v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title><a href="#contacto">@lang("menu.contactanos")</a></v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <form method="POST" action="{{ route('changeLocale') }}">
                                        @csrf
                                        <input name="locale" type="hidden" value="es" />

                                        <button class="btn" type="submit" style="margin-right: 4rem"><img src="{{ asset('img/esp.png') }}" alt="Bandera de España" /></button>
                                    </form>

                                    <form method="POST" action="{{ route('changeLocale') }}">
                                        @csrf
                                        <input name="locale" type="hidden" value="en" />

                                        <button class="btn" type="submit" style="margin-left: 4rem"><img src="{{ asset('img/eng.png') }}" alt="Bandera de Estados Unidos" /></button>
                                    </form>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
                    <div>
                        <v-btn outlined color="primary" href="{{ route('reserva') }}">@lang('menu.hora')</v-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="sticky-top d-none d-md-block">
    <div class="container">
        <div class="col-md">
            <div class="card static border border-primary" style="z-index: 2">
                <div class="card-body bg-info rounded shadow d-flex flex-row justify-content-between align-items-baseline">
                    <a class="btn btn-outline-primary" href="#servicio">@lang('menu.servicio')</a>
                    <a class="btn btn-outline-primary" href="#nosotros">@lang('menu.conocenos')</a>
                    <form method="POST" action="{{ route('changeLocale') }}">
                        @csrf
                        <input name="locale" type="hidden" value="es" />

                        <button class="btn" type="submit" style="margin-right: 4rem"><img src="{{ asset('img/esp.png') }}" alt="Bandera de España" /></button>
                    </form>
                    <img class="img-fluid" alt="Logo lavatu" src="{{ asset('img/logo.png') }}" style="position:absolute; margin: -3% 33% 0 42%; width: 8rem" />

                    <form method="POST" action="{{ route('changeLocale') }}">
                        @csrf
                        <input name="locale" type="hidden" value="en" />

                        <button class="btn" type="submit" style="margin-left: 4rem"><img src="{{ asset('img/eng.png') }}" alt="Bandera de Estados Unidos" /></button>
                    </form>
                    <a class="btn btn-outline-primary" href="#contacto">@lang('menu.contactanos')</a>
                    <a class="btn btn-primary" href="{{ route('reserva') }}">@lang('menu.hora')</a>
                </div>
            </div>
        </div>
    </div>
</nav>
