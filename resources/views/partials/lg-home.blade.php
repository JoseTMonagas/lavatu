    <div class="row my-2 py-5 secondary-bg" id="servicio">
        <article class="col">
            <h5 class="display-4 text-center text-info border-bottom">LavaTú</h5>
            <v-container>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-card shaped>
                            <img src="{{ asset('img/undraw_agreement_aajr.png') }}" class="img-fluid mx-auto d-flex justify-content-center" style="height: 18rem" alt="" />
                            <v-card-title class="text-primary">@lang('titles.barato')</v-card-title>
                            <v-card-text>
                                <b>@lang('titles.lavado')</b>
                                <br />
                                @lang('text.lavado')
                                <br />
                                <b>@lang('titles.secado')</b>
                                <br />
                                @lang('text.secado')
                                <br />
                                <b>@lang('titles.encargo')</b>
                                <br />
                                @lang('text.encargo')
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-card shaped class="mb-2">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2080.6319908206365!2d-73.76961918529958!3d-42.48181524906291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x962219e6fc1b9a87%3A0xd9a626c762b2e2bb!2sGamboa%20594%2C%20Castro%2C%20Los%20Lagos!5e0!3m2!1ses!2scl!4v1589232228737!5m2!1ses!2scl" class="w-100" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            <v-card-title class="text-primary">@lang('titles.cerca')</v-card-title>
                            <v-card-text>@lang('text.cerca')</v-card-text>
                        </v-card>
                        <v-card shaped>
                            <img style="height: 10rem" src="{{ asset('img/logo.png') }}" class="img-fluid mx-auto d-flex justify-content-center" alt="" />
                            <v-card-title class="text-primary">@lang('titles.conoce')</v-card-title>
                            <v-card-text>@lang('text.conoce')</v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </article>
    </div>
    <div class="row my-2 py-5" id="nosotros">
        <article class="col">
            <v-container>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-img src="{{ asset('img/toallas.jpg') }}" class="rounded"></v-img>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-card shaped>
                            <v-card-title class="display-1 text-primary">@lang('titles.quienes')</v-card-title>
                            <v-card-text>@lang('text.quienes')</v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </article>
    </div>
    <div class="row my-2 bg-primary my-2 py-5 secondary-bg">
        <article class="col">
            <v-container>
                <h5 class="display-1 text-center text-info">@lang('titles.equipos')</h5>
                <v-row class="my-2" justify="center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img alt="" src="{{ asset('img/1.jpg') }}" style="height: 60rem" class="img-fluid" />
                            </div>
                            <div class="carousel-item">
                                <img alt="" src="{{ asset('img/2.jpg') }}" style="height: 60rem" class="img-fluid" />
                            </div>
                            <div class="carousel-item">
                                <img alt="" src="{{ asset('img/3.jpg') }}" style="height: 60rem" class="img-fluid" />
                            </div>
                            <div class="carousel-item">
                                <img alt="" src="{{ asset('img/4.jpg') }}" style="height: 60rem" class="img-fluid" />
                            </div>
                            <div class="carousel-item">
                                <img alt="" src="{{ asset('img/5.jpg') }}" style="height: 60rem" class="img-fluid" />
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                </v-row>
            </v-container>
        </article>
    </div>
    <div class="row my-2 pt-5 justify-content-center" id="contacto">
        <article class="col-md-6">
            <v-card class="p-4">
                <h5 class="display-2 border-bottom text-primary text-center">@lang('titles.contacto')</h5>
                <form>
                    <div class="form-group row align-items-center">
                        <label for="email" class="col-sm-2 col-form-label">@lang('contact.email')</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Ej: johndoe@example.com">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="subject" class="col-sm-2 col-form-label">@lang('contact.asunto')</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject" placeholder="Ej: Comentarios">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="msg" class="col-sm-2 col-form-label">@lang('contact.message')</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" name="msg" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">@lang('contact.enviar')</button>
                        </div>
                    </div>
                </form>
            </v-card>
        </article>
    </div>
    <div class="row my-2 py-5 justify-content-center secondary-bg">
        <article class="col-md-8">
            <v-card class="p-4 d-flex flex-column justify-content-center">
                <h5 class="display-4 text-primary border-bottom text-center">@lang('titles.esperas')</h5>
                <v-card-text>@lang('text.esperas')</v-card-text>
                <v-card-actions class="d-flex justify-content-center">
                    <a class="btn btn-outline-primary" href="{{ route('reserva') }}">@lang('menu.hora')</a>
                </v-card-actions>
            </v-card>
        </article>
    </div>
