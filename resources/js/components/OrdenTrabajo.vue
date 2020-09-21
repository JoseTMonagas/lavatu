<template>
    <div class="container">
        <v-card class="p-5">
            <v-card-title>Generar Pedido</v-card-title>
            <v-expansion-panels>
                <v-expansion-panel v-for="(category, i) in items" :key="i">
                    <v-expansion-panel-header>{{
                        category.name
                    }}</v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <div class="row">
                            <v-card
                                shaped
                                v-for="(ropa, j) in category.ropas"
                                :key="j"
                                style="min-width:14rem"
                                class="col-md-2 offset-md-1"
                            >
                                <img
                                    :src="ropa.img"
                                    alt=""
                                    class="img-fluid mx-auto"
                                />
                                <v-card-title class="text-center">{{
                                    ropa.name
                                }}</v-card-title>
                                <v-card-actions>
                                    <div v-if="!ordenesHas(ropa)">
                                        <button
                                            class="btn btn-light"
                                            @click="ordenesAdd(ropa)"
                                        >
                                            Agregar
                                        </button>
                                    </div>
                                    <div class="btn-group" v-else>
                                        <button
                                            @click="ordenesDecrease(ropa)"
                                            class="btn btn-danger"
                                        >
                                            <v-icon>mdi-minus</v-icon>
                                        </button>

                                        <button
                                            class="btn btn-primary"
                                            :key="updater"
                                        >
                                            {{
                                                ordenes[ordenesFindIndex(ropa)]
                                                    .cantidad
                                            }}
                                        </button>

                                        <button
                                            @click="ordenesIncrease(ropa)"
                                            class="btn btn-success"
                                        >
                                            <v-icon>mdi-plus</v-icon>
                                        </button>

                                        <button
                                            @click="ordenesTogglePlanchar(ropa)"
                                            :class="[
                                                'btn',
                                                ordenesHasPlanchar(ropa)
                                            ]"
                                        >
                                            <img
                                                src="/img/ICONOS_BOTONES/housekeeping.png"
                                                alt=""
                                            />
                                        </button>
                                    </div>
                                </v-card-actions>
                            </v-card>
                        </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>
            </v-expansion-panels>
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Detalle</th>
                            <th class="text-left">Cantidad</th>
                            <th class="text-left">Planchado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="orden in ordenes" :key="orden.id">
                            <td>{{ orden.name }}</td>
                            <td>{{ orden.cantidad }}</td>
                            <td>{{ orden.planchar ? "Si" : "No" }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
            <div class="row">
                <div class="col-md-6">
                    <strong>Cantidad de cargas:</strong>
                    <v-slider v-model="cargas" thumb-label="always" min="1" max="10"></v-slider>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-dark">Cargas: $ {{subtotal}}</li>
                        <li class="list-group-item list-group-item-light">Planchado: $ {{planchado}}</li>
                        <li class="list-group-item list-group-item-dark">Despacho: $ {{despacho}}</li>
                        <li class="list-group-item list-group-item-info">Total: $ {{total}}</li>
                    </ul>
                </div>
            </div>
            <v-btn class="mx-auto mt-5" color="primary" @click="generarOrden"
                >Generar Pedido</v-btn
            >

        </v-card>
    </div>
</template>
<script>
export default {
    props: {
        items: {
            type: Array,
            required: true
        },
        storeRoute: {
            type: String,
            required: true
        },
        precioCargas: {
            type: Number,
            default: 8500.0
        },
        despacho: {
            type: Number,
            default: 0.0
        },
    },
    computed: {
        planchado() {
            let planchado = this.ordenes.filter(orden => orden.planchar);
            if (planchado.length > 0) {
                let prices = []
                for (const index in planchado) {
                    var orden = this.ordenes[index]
                    var precio = 0
                    var cantidad = orden.cantidad
                    if (orden.precio_planchado > 0) {
                        precio = parseInt(orden.precio_planchado)
                    } else {
                        if (orden.cantidad < 5) {
                            precio = 700
                        } else {
                            precio = 500
                        }
                    }
                    prices.push(precio * cantidad)
                }
                console.log({prices})
                return prices.reduce((acc, item) => acc + item);
            } else {
                return 0;
            }
        },
        subtotal() {
            return this.cargas * this.precioCargas;
        },
        total() {
            return this.subtotal + this.despacho + this.planchado;
        }
    },
    data() {
        return {
            ordenes: [],
            updater: 0,
            cargas: 0,
        };
    },
    methods: {
        ordenesHas(ropa) {
            return this.ordenes.some(orden => ropa.id == orden.id);
        },
        ordenesAdd(ropa) {
            this.ordenes.push({ ...ropa, cantidad: 0, planchar: false });
        },
        ordenesDelete(index) {
            this.ordenes.splice(index, 1);
        },
        ordenesFindIndex(ropa) {
            return this.ordenes.findIndex(orden => ropa.id == orden.id);
        },
        ordenesIncrease(ropa) {
            let orden = this.ordenesFindIndex(ropa);
            if (orden > -1) {
                let cantidad = this.ordenes[orden].cantidad;
                this.ordenes[orden].cantidad = cantidad + 1;
                this.updater++;
            }
        },
        ordenesDecrease(ropa) {
            let orden = this.ordenesFindIndex(ropa);
            if (orden > -1) {
                let cantidad = this.ordenes[orden].cantidad;
                if (cantidad - 1 > 0) {
                    this.ordenes[orden].cantidad = cantidad - 1;
                    this.updater++;
                } else {
                    this.ordenesDelete(orden);
                }
            }
        },
        ordenesHasPlanchar(ropa) {
            let orden = this.ordenesFindIndex(ropa);
            if (orden > -1) {
                if (this.ordenes[orden].planchar) {
                    return "btn-info";
                } else {
                    return "btn-secondary";
                }
            }
        },
        ordenesTogglePlanchar(ropa) {
            let orden = this.ordenesFindIndex(ropa);
            if (orden > -1) {
                this.ordenes[orden].planchar = !this.ordenes[orden].planchar;
            }
        },
        generarOrden() {
            if (this.ordenes.length > 0) {
                const carga = this.ordenes;
                axios.post(this.storeRoute, { carga }).then(resp => {
                    if (resp.data.status == "OK") {
                        window.location.href = resp.data.redirect;
                    }
                });
            } else {
                console.error("Empty");
            }
        }
    }
};
</script>
