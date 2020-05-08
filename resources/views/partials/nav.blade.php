<nav class="row sticky-top">
    <div class="container d-md-none">
        <img class="img-fluid" alt="Logo lavatu" src="https://via.placeholder.com/300x120?text=Lavatu" style="position:absolute;margin-left:20%;margin-top: -3%; width: 10rem;z-index: 3" />
        <div class="col-md">
            <div class="card mt-4 static">
                <div class="card-body bg-dark rounded shadow d-flex flex-row justify-content-between align-items-baseline">
                    <div class="text-center">
                        <v-menu offset-y z-index="3">
                            <template v-slot:activator="{ on }">
                                <v-btn color="primary" dark v-on="on">
                                    Menu
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item>
                                    <v-list-item-title><a href="#servicio">Nuestro Servicio</a></v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title><a href="#nosotros">Conocenos</a></v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title><a href="#contacto">Contactanos</a></v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
                    <div>
                        <v-btn class="ma-2" outlined color="primary">Solicita ya</v-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-none d-md-block">
        <div class="col-md">
            <div class="card mt-4 static" style="z-index: 2">
                <div class="card-body bg-dark rounded shadow d-flex flex-row justify-content-between align-items-baseline">
                    <div>
                        <v-btn class="ma-2" href="#servicio" outlined color="white">Nuestro Servicio</v-btn>
                        <v-btn class="ma-2" href="#nosotros" outlined color="white">Conocenos</v-btn>
                    </div>
                    <img class="img-fluid" alt="Logo lavatu" src="https://via.placeholder.com/300x120?text=Lavatu" style="position:absolute; margin: -3% 33% 0 36%;" />
                    <div>
                        <v-btn class="ma-2" href="#contacto" outlined color="white">Contactanos</v-btn>
                        <v-btn class="ma-2" outlined color="primary">Solicita ya</v-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
