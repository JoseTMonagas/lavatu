<div class="container-fluid">

    <!-- Banner
         <div class="row jumbotron shadow">
         <div class="col-md-2">
         <span class="badge badge-success shadow w-100 display-1">-30%</span>
         </div>
         <div class="col-md">
         <h1>Promoción por inauguración.</h1>
         <p>
         Acercate a nuestro local y recibe un 30% de descuento en todos nuestros servicios. <br />
         Promoción válida por 20 días a partir del 17 de junio del 2020.</p>
         </div>
         <div class="col-md-2 d-flex justify-content-center">
         <img class="img-fluid" style="width: 6rem" src="{{ asset('img/logo.png') }}"/>
         </div>
         </div>
         End Banner -->

    <div class="row">
        <div class="col-md-4">
            <img
                src="{{ asset('img/Lavanderia-LavaTu_RRSS_junio (4).jpg') }}"
                alt=""
                class="img-fluid"
            />
        </div>
        <div class="col-md-4">
            <img src="{{ asset('img/promo_2x1.jpg') }}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('img/promo_cumple.jpg') }}" class="img-fluid">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mx-auto">

            <v-card class="p-5">
                <div class="d-flex flex-row justify-content-around">
                    <video controls>
                        <source src="{{ asset('img/VIDEOS/PASOS.mp4')}}" type='video/mp4'>
                        <source src="{{ asset('img/VIDEOS/PASOS.webm') }}" type='video/webm'>
                        Tu navegador no soporta videos HTML5.
                    </video>
                    <div class="d-flex flex-column justify-content-center">
                        <strong class="display-3 mb-5">¿Listo para empezar?</strong>
                        <a class="btn btn-outline-success btn-block mt-5" href="{{ route('crear-ot') }}">Ingresa aquí</a>
                    </div>
                </div>
            </v-card>

        </div>

    </div>

    <div class="row bg-primary mb-5">
        <div class="col-xs-12">
            <div class="row banner-top p-3 p-md-5 banner-height">
                <div class="col-md-6 p-md-5">
                    <h3 class="text-info banner-text display-2 mt-5">
                        @lang('titles.banner')
                    </h3>
                    <p class="text-light banner-text body-1 mt-4">

                        @lang('text.banner-1')
                    </p>
                    <p class="text-light banner-text body-1 mt-4">
                        @lang('text.banner-2')
                    </p>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

    <h4 class="text-dark text-bold display-1 mt-5 pt-5">@lang('titles.servicios')</h4>
    <div class="row my-5 py-5">
        <div class="col-md">
            <v-card shaped class="bg-light h-100">
                <span class="d-flex justify-content-center pt-5">
                    <img class="img-fluid" style="width: 8rem" src="{{ asset('img/washing-machine.svg') }}" alt="" />
                </span>
                <v-card-title class="text-info">@lang('titles.lavado')</v-card-title>
                <v-card-text>
                    @lang('text.lavado')
                    <span class="btn btn-outline-info">@lang('text.badge')</span>
                </v-card-text>
            </v-card>
        </div>
        <div class="col-md">
            <v-card shaped class="bg-light h-100">
                <span class="d-flex justify-content-center pt-5">
                    <img class="img-fluid" style="width: 8rem" src="{{ asset('img/dryer.svg') }}" alt="" />
                </span>
                <v-card-title class="text-info">@lang('titles.secado')</v-card-title>
                <v-card-text>
                    @lang('text.secado')
                    <span class="btn btn-outline-info">@lang('text.badge')</span>
                </v-card-text>
            </v-card>
        </div>
        <div class="col-md">
            <v-card shaped class="bg-light h-100">
                <span class="d-flex justify-content-center pt-5">
                    <img class="img-fluid" style="width: 8rem" src="{{ asset('img/laundry.svg') }}" alt="" />
                </span>
                <v-card-title class="text-info">@lang('titles.encargo')</v-card-title>
                <v-card-text>@lang('text.encargo')</v-card-text>
            </v-card>
        </div>

        <div class="col-md">
            <v-card shaped class="bg-info h-100">
                <span class="d-flex justify-content-center pt-5">
                    <img class="img-fluid" style="width: 8rem" src="{{ asset('img/clock.svg') }}" alt="" />
                </span>
                <v-card-title class="text-light">@lang('titles.reserva')</v-card-title>
                <v-card-text class="text-light">@lang('text.reserva')</v-card-text>
                <v-card-actions class="d-flex justify-content-center">
                    <a class="btn btn-outline-primary" href="{{ route('reserva') }}">@lang('titles.reserva')</a>
                </v-card-actions>
            </v-card>
        </div>
    </div>

    <div class="row my-5 bg-primary pt-4">
        <h4 class="text-info display-1 mt-5 pl-5">@lang('titles.elegirnos')</h4>
        <div class="row align-items-center pl-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column justify-content-aroudn">
                        <div class="row ml-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-02.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.1')</h5>
                                <p class="text-light">
                                    @lang('text.1')
                                </p>
                            </div>
                        </div>

                        <div class="row mr-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-06.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.3')</h5>
                                <p class="text-light">
                                    @lang('text.3')
                                </p>
                            </div>
                        </div>

                        <div class="row ml-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-04.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.2')</h5>
                                <p class="text-light">
                                    @lang('text.2')
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" alt="" src="{{ asset('img/Iconos-01.png') }}" />
                    </div>
                    <div class="col-md-4 d-flex flex-column justify-content-around">
                        <div class="row ml-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-03.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.4')</h5>
                                <p class="text-light">
                                    @lang('text.4')
                                </p>
                            </div>
                        </div>

                        <div class="row mr-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-05.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.5')</h5>
                                <p class="text-light">
                                    @lang('text.5')
                                </p>
                            </div>
                        </div>

                        <div class="row ml-5">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset('img/Iconos-07.png') }}" alt="" />
                            </div>
                            <div class="col-md">
                                <h5 class="text-info">@lang('titles.6')</h5>
                                <p class="text-light">
                                    @lang('text.6')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 d-flex flex-column justify-content-around">
            <img-dialog btn-label="@lang('titles.btn-reglamento')" btn-color="orange darken-4" img-src="{{ asset('img/5.jpg') }}"></img-dialog>
            <img-dialog btn-label="@lang('titles.btn-ropa')" btn-color="yellow darken-3" img-src="{{ asset('img/2.jpg') }}"></img-dialog>
        </div>
        <div class="col-md-6">
            <v-card class="bg-info">
                <v-card-title class="text-primary">@lang('titles.suscribete')</v-card-title>
                <form id="suscription-form" action="{{ route('suscriptores.store') }}" method="POST" class="p-5">
                    @csrf

                    <div class="form-group form-row">
                        <label class="col-md-2 col-label" for="">Nombre:</label>
                        <div class="col-md-10">
                            <input class="form-control" name="nombre" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-md-2 col-label" for="">Teléfono:</label>
                        <div class="col-md-10">
                            <input class="form-control" name="telefono" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-md-2 col-label" for="">Correo:</label>
                        <div class="col-md-10">
                            <input class="form-control" name="correo" type="text" value="" />
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <button class="g-recaptcha btn btn-primary" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit' data-action='submit'>Enviar</button>
                        </div>
                    </div>
                </form>
            </v-card>
        </div>
        <div class="col-md-3 d-flex flex-column justify-content-around">

            <img-dialog btn-label="@lang('titles.btn-lavadora')" btn-color="blue darken-4" img-src="{{ asset('img/3.jpg') }}"></img-dialog>
            <img-dialog btn-label="@lang('titles.btn-secadora')" btn-color="blue accent-4" img-src="{{ asset('img/4.jpg') }}"></img-dialog>
        </div>
    </div>
</div>

<!--
     Icons made by <a href="https://www.flaticon.com/authors/good-ware" title="Good Ware">Good Ware</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
     Icons made by <a href="https://www.flaticon.com/authors/surang" title="surang">surang</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
     Icons made by <a href="https://www.flaticon.com/authors/those-icons" title="Those Icons">Those Icons</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
-->
