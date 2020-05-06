@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row my-2" id="servicio">
        <article class="col">
            <h5 class="display-4 text-center border-bottom">LavaTú</h5>
            <v-container>
                <v-row>
                    <v-col>
                        <v-card shaped>
                            <v-img src="https://via.placeholder.com/300x300?text=Lavatu"></v-img>
                            <v-card-title>Con tu bolsillo</v-card-title>
                            <v-card-text>Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit.</v-card-text>
                        </v-card>
                    </v-col>
                    <v-col>
                        <v-card shaped>
                            <v-img src="https://via.placeholder.com/300x300?text=Lavatu"></v-img>
                            <v-card-title>Cerca de ti</v-card-title>
                            <v-card-text>Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit.</v-card-text>
                        </v-card>
                    </v-col>
                    <v-col>
                        <v-card shaped>
                            <v-img src="https://via.placeholder.com/300x300?text=Lavatu"></v-img>
                            <v-card-title>Conoce mas</v-card-title>
                            <v-card-text>Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit.</v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </article>
    </div>
    <div class="row my-2" id="nosotros">
        <article class="col">
            <h5 class="display-2 text-center border-bottom">Conocenos</h6>
                <v-container>
                    <v-row>
                        <v-col>
                            <v-img src="https://via.placeholder.com/300x300?text=Lavatu"></v-img>
                        </v-col>
                        <v-col>
                            <h5 class="display-1 text-center border-bottom">¿Quienes somos?</h5>
                            <p>Consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis! Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin libero nunc, consequat interdum varius sit amet?</p>
                        </v-col>
                    </v-row>
                    <h5 class="display-1 text-center border-bottom">Nuestros Equipos</h5>
                    <v-row class="my-2">
                        <v-carousel cycle height="400" hide-delimiter-background show-arrows-on-hover>
                            <v-carousel-item>
                                <v-sheet color="indigo" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                            <v-carousel-item>
                                <v-sheet color="white" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                            <v-carousel-item>
                                <v-sheet color="black" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                        </v-carousel>
                    </v-row>
                    <v-row class="my-2">
                        <v-carousel cycle height="400" hide-delimiter-background show-arrows-on-hover>
                            <v-carousel-item>
                                <v-sheet color="indigo" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                            <v-carousel-item>
                                <v-sheet color="white" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                            <v-carousel-item>
                                <v-sheet color="black" height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <div class="display-3"> Slide</div>
                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                        </v-carousel>
                    </v-row>
                </v-container>
        </article>
    </div>
    <div class="row my-2 justify-content-center" id="contacto">
        <article class="col-md-6">
            <v-card class="p-4">
                <h5 class="display-2 border-bottom text-center">Contactanos</h5>
                <form>
                    <div class="form-group row align-items-center">
                        <label for="email" class="col-sm-2 col-form-label">Tu E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Ej: johndoe@example.com">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="subject" class="col-sm-2 col-form-label">Asunto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject" placeholder="Ej: Comentarios">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="msg" class="col-sm-2 col-form-label">Tu Mensaje:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="30" name="msg" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </v-card>
        </article>
    </div>
    <div class="row my-2">
        <article class="col">
            <h5 class="display-2 text-center border-bottom">Comentarios de nuestros clientes</h5>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <v-card outline>
                            <v-img src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                            <v-card-text>
                                <i>
                                    "Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit."
                                </i>
                                <b>-Alguien</b>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-md-3">
                        <v-card outline>
                            <v-img src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                            <v-card-text>
                                <i>
                                    "Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit."
                                </i>
                                <b>-Alguien</b>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-md-3">
                        <v-card outline>
                            <v-img src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                            <v-card-text>
                                <i>
                                    "Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit."
                                </i>
                                <b>-Alguien</b>
                            </v-card-text>
                        </v-card>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <v-card outline>
                            <v-img src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                            <v-card-text>
                                <i>
                                    "Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit."
                                </i>
                                <b>-Alguien</b>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-md-3">
                        <v-card outline>
                            <v-img src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                            <v-card-text>
                                <i>
                                    "Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus mauris vitae ultricies leo integer malesuada! Orci nulla pellentesque dignissim enim, sit."
                                </i>
                                <b>-Alguien</b>
                            </v-card-text>
                        </v-card>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <v-img class="mx-2" src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                    <v-img class="mx-2" src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                    <v-img class="mx-2" src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                    <v-img class="mx-2" src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                    <v-img class="mx-2" src="https://via.placeholder.com/50x50?text=Lavatu"></v-img>
                </div>
            </div>
        </article>
    </div>
    <div class="row my-2 justify-content-center">
        <article class="col-md-8">
            <v-card class="p-4 d-flex flex-column justify-content-center">
                <h5 class="display-4 border-bottom text-center">¿Que esperas?</h5>
                <v-card-text>Molestie a, iaculis at erat pellentesque adipiscing commodo elit, at imperdiet dui accumsan sit amet nulla facilisi. Cursus turpis massa tincidunt dui ut ornare lectus sit amet est placerat in.</v-card-text>
                <v-btn>Solicita aqui</v-btn>
            </v-card>
        </article>
    </div>
</div>
@endsection
