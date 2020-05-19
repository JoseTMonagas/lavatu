<template>
    <v-stepper v-model="e1">
        <v-stepper-header>
            <v-stepper-step :complete="e1 > 1" step="1"
                >Ingresa tu ciclo</v-stepper-step
            >

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 2" step="2"
                >Ingresa tu hora</v-stepper-step
            >

            <v-divider></v-divider>

            <v-stepper-step step="3">Confirma tu reserva</v-stepper-step>
        </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card flat>
                    <v-card-title class="d-flex justify-content-center"
                        >Ingresa tu ciclo</v-card-title
                    >
                    <v-row justify="center">
                        <v-radio-group v-model="tipo" :mandatory="false">
                            <v-radio
                                label="Lavado + Secado"
                                value="completo"
                            ></v-radio>
                            <v-radio label="Lavado" value="secado"></v-radio>
                        </v-radio-group>
                    </v-row>
                    <v-row justify="center">
                        <v-col cols="12" md="4">
                            <h5 class="text-center mb-5">Cantidad de ciclos</h5>
                            <v-slider
                                v-model="cantidad"
                                thumb-label="always"
                                :max="5"
                                :min="1"
                            ></v-slider>
                        </v-col>
                    </v-row>
                    <v-card-actions class="d-flex justify-content-around">
                        <v-btn text>Cancelar</v-btn>

                        <v-btn color="primary" @click="validarCiclo">
                            Continuar
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-stepper-content>

            <v-stepper-content step="2">
                <v-card flat>
                    <v-card-title class="d-flex justify-content-center"
                        >Ingresa tu hora</v-card-title
                    >
                    <v-row justify="center">
                        <v-col cols="12" xs="6" md="4">
                            <v-date-picker
                                v-model="fecha"
                                :min="now"
                            ></v-date-picker>
                        </v-col>
                        <v-col cols="12" xs="6" md="4">
                            <v-time-picker
                                :full-width="true"
                                v-model="hora"
                                format="24hr"
                                min="8:00"
                                max="19:00"
                            ></v-time-picker>
                        </v-col>
                    </v-row>

                    <v-card-actions class="d-flex justify-content-around">
                        <v-btn text>Cancelar</v-btn>

                        <v-btn color="primary" @click="disponibilidad">
                            Continuar
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-stepper-content>

            <v-stepper-content step="3">
                <v-row>
                    <v-col cols="12" md="6">
                        <v-card>
                            <v-card-title>REGLAMENTO DE USO</v-card-title>
                            <v-card-text>
                                En caso de detectar algún inconveniente en las
                                máquinas, dar aviso inmediato al personal a
                                cargo. <br />
                                Para garantizar un óptimo servicio, LavaTú le
                                ayudará en preparar su ropa para el lavado y
                                secado, entregando las sugerencias pertinentes.
                                <br />
                                Sólo se permite el uso de detergente líquido.
                                <br />
                                No se debe ingresar a las lavadoras y secadoras
                                elementos con exceso de suciedad, peso o volumen
                                tales como zapatillas, artículos de mascotas,
                                cobertores, plumones, cubrecamas, almohadas,
                                alfombras, cortinas o elementos similares.
                                <br />
                                LavaTú no realiza desmanchado de ningún tipo de
                                ropa. El proceso de desmanchado de ropa es de
                                exclusiva responsabilidad del cliente. <br />
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col>
                        <v-card>
                            <v-card-title>
                                Confirma tu reserva
                            </v-card-title>
                            <v-list>
                                <v-list-item>Fecha: {{ fecha }}</v-list-item>
                                <v-list-item>Hora: {{ hora }}</v-list-item>
                                <v-list-item
                                    >Tipo de Ciclo: {{ tipo }}</v-list-item
                                >
                                <v-list-item
                                    >Numero de Ciclos:
                                    {{ cantidad }}</v-list-item
                                >
                            </v-list>
                        </v-card>
                    </v-col>
                </v-row>

                <v-btn color="primary" @click="reservar">
                    Reservar
                </v-btn>

                <v-btn text>Cancelar</v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    props: {
        availableRoute: {
            type: String,
            default: "",
        },
        reservaRoute: {
            type: String,
            default: "",
        },
        homeRoute: {
            type: String,
            default: "",
        }
    },
    data() {
        return {
            e1: 1,
            fecha: null,
            hora: null,
            tipo: 'completo',
            cantidad: 1,
            disponible: false,
        };
    },
    computed: {
        now() {
            return new Date().toISOString();
        },
    },
    methods: {
        getDate() {
            return this.fecha + ' ' + this.hora
        },
        validarCiclo() {
            if (this.tipo == null) {
                alert("Escoga un tipo de ciclo");
            } else {
                this.e1 = 2;
            }
        },
        disponibilidad() {
            const datetime = this.getDate();
            axios.post(this.availableRoute, { datetime }).then((resp) => {
                this.disponible = Boolean(resp.data);
                if (this.disponible) {
                    this.e1 = 3;
                } else {
                    Swal.fire({
                        title: 'Sin disponibilidad',
                        icon: 'error',
                        text: 'No hay disponibilidad a esa hora'
                    });
                }
            });
        },
        reservar() {
            const hora = this.getDate();
            const tipo_carga = this.tipo;
            const carga = this.cantidad;

            axios
                .post(this.reservaRoute, { hora, carga, tipo_carga })
                .then((resp) => {
                    if (resp.data.id > 0) {
                        Swal.fire({
                            title: 'Reserva lista',
                            icon: 'success',
                            text: 'Reserva realizada correctamente'
                        });
                        window.location = this.homeRoute;
                    } else {
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'No se pudo realizar la reserva, pruebe nuevamente mas tarde'
                        });
                        window.location = this.homeRoute;
                    }
                });
        },
    },
};
</script>
