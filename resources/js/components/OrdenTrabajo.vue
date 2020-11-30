<template>
  <div class="container">
    <v-card class="p-5">
      <v-card-title class="d-flex flex-row justify-content-between">
        <strong>Generar Pedido</strong>
        <span>
          <slot name="header"></slot>
        </span>
      </v-card-title>
      <hr />
      <v-stepper v-model="e1" non-linear>
        <v-stepper-header>
          <v-stepper-step editable step="1">
            Datos de tu orden
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step editable step="2">
            Detalle de tu Orden
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step editable step="3">
            Resumen de tu Orden
          </v-stepper-step>
        </v-stepper-header>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card class="p-5">
              <div class="form-row justify-content-around">
                <div class="col-md-4">
                  <strong class="mb-5">Cantidad de cargas:</strong>
                  <v-text-field
                    type="number"
                    dense
                    outlined
                    v-model="cargas"
                  ></v-text-field>
                  <small v-if="errors.cargas" class="text-danger"
                    >No puede ser menor o igual a 0</small
                  >
                </div>
                <div class="col-md-4">
                  <strong class="mb-5">Cantidad a Planchar:</strong>
                  <v-text-field
                    type="number"
                    dense
                    outlined
                    v-model="planchas"
                  ></v-text-field>
                  <small v-if="errors.planchas" class="text-danger"
                    >No puede ser menor a 0</small
                  >
                </div>
              </div>
            </v-card>

            <div class="row justify-content-end">
              <div class="col-md-2">
                <v-btn color="primary" @click="validate(2)">
                  Continuar
                </v-btn>
              </div>
            </div>
          </v-stepper-content>

          <v-stepper-content step="2">
            <v-card class="p-2">
              <div class="row">
                <div class="col-md-8">
                  <v-expansion-panels>
                    <v-expansion-panel v-for="(category, i) in items" :key="i">
                      <v-expansion-panel-header>{{
                        category.name
                      }}</v-expansion-panel-header>
                      <v-expansion-panel-content>
                        <div class="row justify-content-between">
                          <div
                            v-for="(ropa, j) in category.ropas"
                            class="col-md-4 d-inline-flex flex-column text-center"
                          >
                            <img
                              :src="ropa.img"
                              alt=""
                              class="img-fluid mx-auto"
                            />

                            <b>{{ ropa.name }}</b>

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
                              <button class="btn btn-primary" :key="updater">
                                {{ ordenes[ordenesFindIndex(ropa)].cantidad }}
                              </button>
                              <button
                                @click="ordenesIncrease(ropa)"
                                class="btn btn-success"
                              >
                                <v-icon>mdi-plus</v-icon>
                              </button>
                              <button
                                @click="ordenesTogglePlanchar(ropa)"
                                :class="['btn', ordenesHasPlanchar(ropa)]"
                              >
                                <img :src="assetRoute" alt="" />
                              </button>
                            </div>
                          </div>
                        </div>
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-expansion-panels>
                  <small v-if="errors.detalle" class="text-danger"
                    >Escoja al menos una prenda</small
                  >
                </div>
                <div class="col-md-4">
                  <v-simple-table fixed-header height="300">
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
                </div>
              </div>
            </v-card>

            <div class="row justify-content-between">
              <div class="col-md-2">
                <v-btn text @click="e1 = 1">
                  Volver
                </v-btn>
              </div>

              <div class="col-md-2">
                <v-btn color="primary" @click="validate(3)">
                  Continuar
                </v-btn>
              </div>
            </div>
          </v-stepper-content>

          <v-stepper-content step="3">
            <v-card class="p-5">
              <strong class="mb-5">Detalle del pedido:</strong>
              <p>
                Cargas: <b>$ {{ subtotal }}</b>
              </p>
              <p>
                Planchado: <b>$ {{ planchado }}</b>
              </p>
              <p>
                Despacho: <b>$ {{ despacho }}</b>
              </p>
              <p class="border-top">
                Total: <b>$ {{ total }}</b>
              </p>
            </v-card>

            <div class="row justify-content-between">
              <div class="col-md-2">
                <v-btn text @click="e1 = 2">
                  Volver
                </v-btn>
              </div>

              <div class="col-md-4">
                <v-dialog v-model="dialog" persistent>
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn color="primary" dark v-bind="attrs" v-on="on">
                      Generar Pedido
                    </v-btn>
                  </template>
                  <v-card v-if="!paying">
                    <v-card-title class="headline">
                      Condiciones del Servicio, Precio y Recomendaciones
                    </v-card-title>
                    <v-card-text class="text-servicios">
                      Valor de lavador-secado de una carga de ropa:
                      <b>$8.700 (Ocho mil setecientos pesos chilenos)</b>
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      La cobertura de nuestro servicio de Retiro y Entrega a
                      domicilio es gratuito para la denominada zona urbana de
                      Castro. Para servicios fuera de la zona urbana de Castro,
                      cont&aacute;ctenos (llamado o WhatsApp) al
                      <b>+56 9 5699 3082</b> o bien al correo
                      <a href="mailto:contacto@lavatu.cl"
                        ><b>contacto@lavatu.cl</b></a
                      >
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      LavaT&uacute; no presta sus servicios para lavado y secado
                      de ropa de mascotas.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      LavaT&uacute; no realiza el desmanchado en ning&uacute;n
                      tipo de ropa. El proceso de desmanchado de ropa es de
                      exclusiva responsabilidad del cliente.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      Sabemos que el tiempo de nuestros clientes es invaluable
                      por lo cual intentamos responder a sus requerimientos en
                      el menor tiempo posible. Hemos dise&ntilde;ado un horario
                      de retiro y entrega con el prop&oacute;sito que nuestros
                      clientes planifiquen, aprovechen y disfruten de su tiempo.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      Horario de retiros y entregas:
                      <b>
                        De lunes a viernes desde las 10:00 horas hasta las 18:00
                        horas
                      </b>
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      El plazo de entrega depender&aacute; de la magnitud del
                      servicio pero nuestros esfuerzos est&aacute;n dirigidos a
                      poder entregar la ropa al d&iacute;a h&aacute;bil
                      siguiente de haber sido retirada del domicilio de nuestro
                      cliente.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      Una vez que el cliente finalice la solicitud de servicio,
                      a la brevedad nos pondremos en contacto para coordinar el
                      retiro. As&iacute; tambi&eacute;n, una vez que la ropa
                      est&eacute; ya lista (lavada y secada), nos pondremos en
                      contacto con nuestro cliente para confirmar el horario de
                      entrega con el prop&oacute;sito de asegurarnos que haya
                      alguna persona en la residencia del cliente que reciba la
                      ropa.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      Para que la entrega se haga efectiva en el per&iacute;odo
                      establecido, el servicio debe estar previamente pagado.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      El ciclo de Lavado y Secado es por carga de ropa. El
                      tama&ntilde;o de la carga se determina m&aacute;s por el
                      volumen de la ropa que por su peso. Como referencia, se
                      considera que una carga de ropa es aproximadamente 8 Kg a
                      8,5 Kg. Sobrecargar la m&aacute;quina lavadora con ropa
                      conlleva a que no obtendremos un buen resultado del lavado
                      de la ropa.
                    </v-card-text>
                    <v-card-text class="text-servicios">
                      Una vez recepcionada la ropa y antes de ponerla en la
                      lavadora, &eacute;sta podr&iacute;a ser separada en cargas
                      adicionales si alguna de las siguientes situaciones
                      sucede:
                      <ul>
                        <li>Hay prendas con exceso de suciedad.</li>
                        <li>
                          El volumen de la ropa recepcionada excede el volumen
                          recomnedable de carga para la lavadora.
                        </li>
                      </ul>
                      En caso de ocurrir alguna de las situaciones previamente
                      descritas, contactaremos al cliente para requerir su
                      autorizaci&oacute;n con el objetivo de procesar cargas de
                      ropa adicionales.
                    </v-card-text>
                    <v-card-title class="headline">
                      Recomendaciones generales respecto del env&iacute;o de
                      ropa
                    </v-card-title>
                    <v-card-text class="text-servicios">
                      <ul>
                        <li>
                          Siempre revisar las etiquetas de la ropa con las
                          recomendaciones del fabricante respecto de lavado y
                          secado.
                        </li>
                        <li>
                          Aconsejamos:
                          <ul>
                            <li>Separar la ropa por color.</li>
                            <li>Separar la ropa por temperatura de lavado.</li>
                            <li>Separar la ropa por nivel de suciedad.</li>
                          </ul>
                        </li>
                        <li>
                          Antes de enviar la ropa a lavar:
                          <ul>
                            <li>Vaciar sus bolsillos.</li>
                            <li>Retirar cinturones no lavables.</li>
                            <li>Retirar todo tipo de adorno removible.</li>
                            <li>Reparar prendas descosidas o rotas.</li>
                          </ul>
                        </li>
                      </ul>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="yellow darken-2" text @click="closeDlg">
                        No Acepto
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn color="green darken-2" text @click="paying = true">
                        Acepto Condiciones del Servicio, Precio y
                        Recomendaciones
                      </v-btn>
                      <v-spacer></v-spacer>
                    </v-card-actions>
                  </v-card>
                  <v-card v-else>
                    <v-card-title class="headline"
                      >Detalle de tu pago</v-card-title
                    >
                    <v-card-text>
                      <div class="d-flex flex-column">
                        <span class="text-servicios">
                          <b>Cantidad de prendas para lavado y secado:</b>
                          {{ cantidadLavado }}
                        </span>
                        <span class="text-servicios">
                          <b>Cantidad de prendas para planchado:</b>
                          {{ cantidadPlanchado }}
                        </span>
                        <span class="text-servicios">
                          <b>Cantidad de cargas:</b>
                          {{ cargas }}
                        </span>
                        <span class="text-servicios">
                          <b>Subtotal de cargas:</b>
                          {{ subtotal }}
                        </span>
                        <span class="text-servicios">
                          <b>Subtotal de planchado:</b>
                          {{ planchado }}
                        </span>
                        <v-divider></v-divider>
                        <span class="text-servicios">
                          <b>Total a pagar:</b>
                          {{ total }}
                        </span>
                      </div>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="yellow darken-2" text @click="closeDlg">
                        Cancelar
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn color="green darken-2" text @click="generarOrden">
                        Iniciar proceso de pago en Webpay
                      </v-btn>
                      <v-spacer></v-spacer>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
              </div>
            </div>
          </v-stepper-content>
        </v-stepper-items>
      </v-stepper>

      <div class="row">
        <div class="col-md-12">
          <slot name="footer"></slot>
        </div>
      </div>
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
    user: {
      type: Object,
      required: true
    },
    precioCargas: {
      type: Number,
      default: 8700.0
    },
    despacho: {
      type: Number,
      default: 0.0
    },
    assetRoute: {
      type: String,
      required: true
    }
  },
  computed: {
    planchado() {
      let planchado = this.ordenes.filter(orden => orden.planchar);
      if (planchado.length > 0) {
        let prices = [];
        for (const index in planchado) {
          var orden = this.ordenes[index];
          var precio = 0;
          var cantidad = orden.cantidad;
          if (orden.cantidad < 5) {
            precio = 700;
          } else {
            precio = 500;
          }
          prices.push(precio * cantidad);
        }
        return prices.reduce((acc, item) => acc + item);
      } else {
        return 0;
      }
    },
    subtotal() {
      return this.cargas * this.precioCargas;
    },
    adicionales() {
      let items = this.ordenes.filter(orden => orden.price > 0);
      if (items.length > 0) {
        return items.reduce((acc, item) => acc + item.price);
      } else {
        return 0;
      }
    },
    total() {
      return this.subtotal + this.despacho + this.planchado + this.adicionales;
    },
    cantidadLavado() {
      if (this.ordenes.length > 0) {
        let acc = 0;
        for (const orden in this.ordenes) {
          acc += parseInt(this.ordenes[orden].cantidad);
        }
        return acc;
      }

      return 0;
    },
    cantidadPlanchado() {
      if (this.ordenes.length > 0) {
        const planchados = this.ordenes.filter(orden => orden.planchar);
        if (planchados.length > 0) {
          let acc = 0;
          for (const orden in planchados) {
            acc += parseInt(planchados[orden].cantidad);
          }
          return acc;
        }
      }

      return 0;
    }
  },
  data() {
    return {
      ordenes: [],
      updater: 0,
      cargas: 1,
      planchas: 0,
      dialog: false,
      paying: false,
      e1: 1,
      errors: {
        cargas: false,
        planchas: false,
        detalle: false
      }
    };
  },
  methods: {
    ordenesHas(ropa) {
      return this.ordenes.some(orden => ropa.id == orden.id);
    },
    ordenesAdd(ropa) {
      this.ordenes.push({ ...ropa, cantidad: 1, planchar: false });
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
        let cantidad = this.ordenes[orden].cantidad - 1;
        if (cantidad > 0) {
          this.ordenes[orden].cantidad = cantidad;
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
        const user_id = this.user.id;
        const cargas = this.cargas;
        const planchas = this.planchas;
        if (cargas <= 0) return;
        axios.post(this.storeRoute, { carga, user_id, cargas }).then(resp => {
          if (resp.data.status == "OK") {
            window.location.href = resp.data.redirect;
          }
        });
      } else {
        console.error("Empty");
      }
    },
    closeDlg() {
      this.paying = false;
      this.dialog = false;
    },
    validate(nextStep) {
      switch (nextStep) {
        case 2:
          if (this.cargas <= 0) {
            this.errors.cargas = true;
          } else if (this.planchas < 0) {
            this.errors.planchas = true;
          } else {
            this.errors.cargas = false;
            this.errors.planchas = false;
            this.e1 = nextStep;
          }
          break;
        case 3:
          if (this.ordenes.length <= 0) {
            this.errors.detalle = true;
          } else {
            this.errors.detalle = false;
            this.e1 = nextStep;
          }
      }
    }
  }
};
</script>
<style type="text/css" media="screen">
.text-servicios {
  font-size: 1.3rem;
  text-align: justify;
}
</style>
