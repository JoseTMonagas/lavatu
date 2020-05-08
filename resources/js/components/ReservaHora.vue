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
                        <v-radio-group class="px-5" v-model="ciclo" row>
                            <v-radio
                                label="Lavado + Secado"
                                value="completo"
                            ></v-radio>
                            <v-radio
                                label="Solo Secado
"
                                value="secado"
                            ></v-radio>
                        </v-radio-group>
                    </v-row>
                    <v-card-actions class="d-flex justify-content-around">
                        <v-btn text>Cancelar</v-btn>

                        <v-btn color="primary" @click="e1 = 2">
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
                            <v-date-picker v-model="fecha"></v-date-picker>
                        </v-col>
                        <v-col cols="12" xs="6" md="4">
                            <v-time-picker :full-width="true" v-model="hora"></v-time-picker>
                        </v-col>
                    </v-row>

                    <v-card-actions class="d-flex justify-content-around">
                        <v-btn text>Cancelar</v-btn>

                        <v-btn color="primary" @click="e1 = 3">
                            Continuar
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-stepper-content>

            <v-stepper-content step="3">
                <v-card class="mb-12" flat>
                    <v-card-title>Confirma tu reserva</v-card-title>
                    <v-card-text
                        >Aliquam eleifend mi in nulla posuere sollicitudin
                        aliquam ultrices sagittis orci, a scelerisque purus
                        semper eget duis at! A arcu cursus vitae congue mauris
                        rhoncus aenean vel elit scelerisque mauris!</v-card-text
                    >
                </v-card>

                <v-btn color="primary" @click="e1 = 1">
                    Continuar
                </v-btn>

                <v-btn text>Cancelar</v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>
<script>
export default {
    data() {
        return {
            e1: 1,
            ciclo: null,
            fecha: null,
            hora: null,
        };
    },
};
</script>
