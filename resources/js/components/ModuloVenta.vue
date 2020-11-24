<template>
  <div class="container-fluid">
    <v-card>
      <v-card-title class="d-flex flex-row justify-content-between">
        Registro de Ventas
        <a class="" :href="returnRoute">Volver</a>
      </v-card-title>
      <v-card-text>
        <div class="form-row">
          <div class="col-md-4">
            <v-autocomplete
              :items="clientes"
              item-text="nombre"
              item-value="id"
              label="Cliente"
              outlined
              filled
              v-model="selectedCliente"
              @change="fillClienteData"
            ></v-autocomplete>
            <v-btn
              :loading="loading"
              :disabled="loading"
              color="primary"
              dark
              @click.stop="dlgCliente = true"
              >Nuevo Cliente</v-btn
            >
          </div>
          <div
            class="col-md-4 d-flex flex-column"
            v-if="selectedCliente != null"
          >
            <span> <b>Nombre:</b> {{ nombre }} </span>
            <span> <b>Telefono:</b> {{ telefono }} </span>
            <span> <b>Email:</b> {{ email }} </span>
            <span> <b>Direccion:</b> {{ direccion }} </span>
            <span> <b>Fecha de Nacimiento:</b> {{ nacimiento }} </span>
            <span> <b>Cliente Frecuente:</b> {{ frecuente }} </span>
          </div>
          <div
            class="col-md-4 d-flex flex-column"
            v-if="selectedCliente != null"
          >
            <span> <b>Visitas:</b> {{ visitas }} </span>
            <span> <b>Ciclos:</b> {{ ciclos }} </span>
            <span> <b>Monto:</b> {{ monto }} </span>
          </div>
        </div>

        <div class="form-row align-items-end">
          <div class="col-md-3">
            <label for="fecha_ingreso">
              <b>Fecha Ingreso:</b>
            </label>
            <input
              class="form-control form-control-lg"
              v-model="fechaIngreso"
              type="date"
            />
          </div>
          <div class="col-md-3 offset-md-1">
            <label for="fecha_venta">
              <b>Fecha Venta:</b>
            </label>
            <input
              class="form-control form-control-lg"
              v-model="fechaVenta"
              type="date"
            />
          </div>
          <div class="col-md-4 offset-md-1">
            <v-btn
              :loading="loading"
              :disabled="loading"
              color="primary"
              @click="save"
              >Guardar Venta</v-btn
            >
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-3">
            <v-autocomplete
              :items="servicios"
              item-text="nombre"
              item-value="id"
              outlined
              filled
              v-model="selectedServicio"
              label="Servicio"
            ></v-autocomplete>
          </div>
          <div class="col-md-3 offset-md-1">
            <v-text-field
              v-model="selectedCantidad"
              label="Cantidad"
              outlined
              filled
            ></v-text-field>
          </div>
          <div class="col-md-2 offset-md-1">
            <v-btn
              :loading="loading"
              :disabled="loading"
              color="primary"
              @click="agregarDetalle"
              >Agregar Servicio</v-btn
            >
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-8">
            <v-simple-table>
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">Tipo de Servicio</th>
                    <th class="text-left">Precio Unitario</th>
                    <th class="text-left">Cantidad</th>
                    <th class="text-left">Valor</th>
                    <th class="text-left">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(detalle, index) in detalles" :key="index">
                    <td>{{ detalle.tipoServicio.nombre }}</td>
                    <td>{{ detalle.tipoServicio.precio }}</td>
                    <td>{{ detalle.cantidad }}</td>
                    <td>{{ detalle.valor }}</td>
                    <td>
                      <v-btn @click="eliminarDetalle(index)">Eliminar</v-btn>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </div>
          <div class="col-md-4 d-flex flex-column">
            <span class="display-1">
              <b>Valor Total:</b>
              {{ subtotal }}
            </span>
            <span class="display-1">
              <b>Descuento:</b>
              {{ descuento }}
            </span>
            <span class="display-1">
              <b>Precio Final:</b>
              {{ total }}
            </span>

            <hr />

            <span>
              <b>Promocion:</b>
              <v-select
                :items="[
                  { text: 'Sin Descuento', value: 'NONE' },
                  { text: 'Descuento Porcentual', value: 'PERCENT' },
                  { text: 'Descuento por Valor Fijo', value: 'FIXED' }
                ]"
                v-model="selectedPromocion"
                outlined
                filled
              ></v-select>
              <v-text-field
                v-model="valuePromocion"
                outlined
                filled
                label="Valor Promocion"
              ></v-text-field>
            </span>

            <hr />

            <span>
              <b>Forma de Pago:</b>
              <v-autocomplete
                :items="formasPago"
                item-text="nombre"
                item-value="id"
                v-model="selectedFormaPago"
                outlined
                filled
              ></v-autocomplete>
            </span>
            <span>
              <b>Folio:</b>
              <v-text-field outlined filled v-model="folio"></v-text-field>
            </span>
            <span>
              <b>Observaciones:</b>
              <v-text-field
                outlined
                filled
                v-model="observaciones"
              ></v-text-field>
            </span>
          </div>
        </div>
      </v-card-text>
    </v-card>
    <v-dialog v-model="dlgCliente" max-width="800">
      <v-card>
        <v-card-title class="headline">Nuevo Cliente</v-card-title>
        <v-card-text>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nombre">Nombre:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.nombre"
                type="text"
              />
              <small class="text-muted">Obligatorio</small>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="telefono">Telefono:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.telefono"
                name="telefono"
                type="text"
              />
              <small class="text-muted">Obligatorio</small>
            </div>

            <div class="col-md-6 form-group">
              <label for="email">Correo:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.email"
                type="email"
              />
              <small class="text-muted">Obligatorio</small>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="direccion">Direccion:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.direccion"
                type="text"
              />
              <small class="text-muted">Obligatorio</small>
            </div>

            <div class="col-md-6 form-group">
              <label for="fecha_nacimiento">Fecha Nacimiento:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.fecha_nacimiento"
                type="date"
              />
              <small class="text-muted">Obligatorio</small>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="cliente_frecuente">Cliente Frecuentes:</label>
              <input
                class="form-control"
                v-model="nuevoCliente.cliente_frecuente"
                value="1"
                type="checkbox"
              />
            </div>
          </div>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="cancelarCliente"
            >Cancelar</v-btn
          >
          <v-btn
            :loading="loading"
            :disabled="loading"
            color="green darken-1"
            text
            @click="saveCliente"
            >Guardar</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {
  props: {
    clienteList: {
      type: String,
      required: true
    },
    clienteStore: {
      type: String,
      required: false
    },
    ventaStore: {
      type: String,
      required: true
    },
    servicios: {
      type: Array,
      required: true
    },
    formasPago: {
      type: Array,
      required: true
    },
    editItem: {
      type: Object,
      required: false,
      default: null
    },
    ventaUpdate: {
      type: String,
      required: false,
      default: ""
    },
    returnRoute: {
      type: String,
      required: true
    }
  },
  computed: {
    visitas() {
      if (this.selectedCliente != null) {
        const clienteIndex = this.findCliente(this.selectedCliente);
        if (clienteIndex >= 0) {
          return this.clientes[clienteIndex].visitas;
        }
      }
      return 0;
    },
    ciclos() {
      if (this.selectedCliente != null) {
        const clienteIndex = this.findCliente(this.selectedCliente);
        if (clienteIndex >= 0) {
          return this.clientes[clienteIndex].ciclos;
        }
      }
      return 0;
    },
    monto() {
      if (this.selectedCliente != null) {
        const clienteIndex = this.findCliente(this.selectedCliente);
        if (clienteIndex >= 0) {
          return this.clientes[clienteIndex].monto;
        }
      }
      return 0;
    },
    subtotal() {
      let acc = 0;
      for (const detalle of this.detalles) {
        acc += parseFloat(detalle.valor);
      }
      return acc;
    },
    descuento() {
      if (
        this.selectedPromocion != null &&
        this.valuePromocion > 0 &&
        this.subtotal > 0
      ) {
        switch (this.selectedPromocion) {
          case "PERCENT":
            return this.subtotal * (this.valuePromocion / 100);
            break;
          case "FIXED":
            return this.valuePromocion;
            break;
          default:
            return 0;
            break;
        }
      }
      return 0;
    },
    total() {
      if (this.subtotal >= 0 && this.descuento >= 0) {
        return parseFloat(this.subtotal) - parseFloat(this.descuento);
      }
      return 0;
    }
  },
  data() {
    return {
      loading: false,
      clientes: [],
      selectedCliente: null,
      fechaIngreso: null,
      fechaVenta: null,
      selectedServicio: null,
      selectedCantidad: null,
      nombre: "",
      email: "",
      telefono: "",
      direccion: "",
      nacimiento: "",
      frecuente: "",

      dlgCliente: false,
      detalles: [],
      observaciones: "",
      nuevoCliente: {
        nombre: "",
        telefono: "",
        email: "",
        direccion: "",
        fecha_nacimiento: "",
        cliente_frecuente: false
      },
      selectedPromocion: null,
      valuePromocion: null,
      selectedFormaPago: null,
      folio: ""
    };
  },
  created() {
    this.getClientes();
    this.$nextTick(() => {
      if (this.editItem != null) {
        this.selectedCliente = this.editItem.cliente_id;
        this.fechaIngreso = this.editItem.fecha_ingreso;
        this.fechaVenta = this.editItem.fecha_venta;
        for (const index in this.editItem.tipo_servicios) {
          const tipoServicio = this.editItem.tipo_servicios[index];
          const cantidad = this.editItem.tipo_servicios[index].pivot.cantidad;
          const valor = this.editItem.tipo_servicios[index].pivot.valor;
          this.detalles.push({ tipoServicio, cantidad, valor });
        }
        this.selectedPromocion = this.editItem.tipo_descuento;
        this.valuePromocion = this.editItem.descuento;
        this.selectedFormaPago = this.editItem.forma_pago_id;
        this.folio = this.editItem.folio;
        this.observaciones = this.editItem.observaciones;
      }
    });
  },
  methods: {
    getClientes() {
      this.loading = true;
      axios.get(this.clienteList).then(resp => {
        this.clientes = resp.data;
        this.loading = false;
        if (this.editItem != null) {
          this.fillClienteData();
        }
      });
    },
    saveCliente() {
      const nombre = this.nuevoCliente.nombre;
      const telefono = this.nuevoCliente.telefono;
      const email = this.nuevoCliente.email;
      const direccion = this.nuevoCliente.direccion;
      const fecha_nacimiento = this.nuevoCliente.fecha_nacimiento;
      const cliente_frecuente = this.nuevoCliente.cliente_frecuente;

      this.loading = true;
      axios
        .post(this.clienteStore, {
          nombre,
          telefono,
          email,
          direccion,
          fecha_nacimiento,
          cliente_frecuente
        })
        .catch(error => {
          if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
          }
        })
        .then(resp => {
          if (resp.status == 200) {
            alert("Cliente guardado exitosamente");
            this.getClientes();
          } else {
            alert("Ocurrio error guardando el cliente");
          }
          this.loading = false;
          this.dlgCliente = false;
        });
    },
    cancelarCliente() {
      this.nuevoCliente = {
        nombre: "",
        telefono: "",
        email: "",
        direccion: "",
        fecha_nacimiento: "",
        cliente_frecuente: false
      };
      this.dlgCliente = false;
    },
    fillClienteData() {
      const cliente = this.clientes.find(
        cliente => cliente.id == this.selectedCliente
      );
      this.nombre = cliente.nombre;
      this.email = cliente.email;
      this.telefono = cliente.telefono;
      this.direccion = cliente.direccion;
      this.nacimiento = cliente.fecha_nacimiento;
      this.frecuente = cliente.cliente_frecuente ? "Si" : "No";
    },
    agregarDetalle() {
      if (this.selectedServicio != null) {
        const tipoServicio = this.servicios.find(
          servicio => servicio.id == this.selectedServicio
        );

        const find = this.detalles.find(
          detalle => detalle.tipoServicio.id == tipoServicio.id
        );

        if (find != undefined) return;

        const cantidad = this.selectedCantidad;
        const valor = tipoServicio.precio * cantidad;
        this.detalles.push({ tipoServicio, cantidad, valor });
      }
      this.selectedServicio = null;
      this.cantidad = null;
    },
    eliminarDetalle(index) {
      this.detalles.splice(index, 1);
    },
    findCliente(clienteId) {
      return this.clientes.findIndex(cliente => cliente.id == clienteId);
    },
    save() {
      const cliente_id = this.selectedCliente;
      const detalle = this.detalles;
      const fecha_ingreso = this.fechaIngreso;
      const fecha_venta = this.fechaVenta;
      const tipo_descuento = this.selectedPromocion ?? "NONE";
      const descuento = this.valuePromocion ?? 0;
      const forma_pago_id = this.selectedFormaPago;
      const folio = this.folio;
      const observaciones = this.observaciones;
      let route = "";
      this.loading = true;
      if (this.ventaUpdate != null && this.editItem != null) {
        axios
          .put(this.ventaUpdate, {
            cliente_id,
            detalle,
            fecha_ingreso,
            fecha_venta,
            tipo_descuento,
            descuento,
            forma_pago_id,
            folio,
            observaciones
          })
          .catch(error => {
            if (error.response) {
              // The request was made and the server responded with a status code
              // that falls out of the range of 2xx
              console.log(error.response.data);
              console.log(error.response.status);
              console.log(error.response.headers);
            } else if (error.request) {
              // The request was made but no response was received
              // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
              // http.ClientRequest in node.js
              console.log(error.request);
            } else {
              // Something happened in setting up the request that triggered an Error
              console.log("Error", error.message);
            }
          })
          .then(resp => {
            if (resp.data == "OK") {
              alert("Guardado Exitosamente");
            } else {
              alert(
                "No se pudo guardar, revise la informacion ingresada, e intente nuevamente"
              );
            }
            this.loading = false;
          });
      } else {
        axios
          .post(this.ventaStore, {
            cliente_id,
            detalle,
            fecha_ingreso,
            fecha_venta,
            tipo_descuento,
            descuento,
            forma_pago_id,
            folio,
            observaciones
          })
          .catch(error => {
            if (error.response) {
              // The request was made and the server responded with a status code
              // that falls out of the range of 2xx
              console.log(error.response.data);
              console.log(error.response.status);
              console.log(error.response.headers);
            } else if (error.request) {
              // The request was made but no response was received
              // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
              // http.ClientRequest in node.js
              console.log(error.request);
            } else {
              // Something happened in setting up the request that triggered an Error
              console.log("Error", error.message);
            }
          })
          .then(resp => {
            if (resp.data == "OK") {
              alert("Guardado Exitosamente");
            } else {
              alert(
                "No se pudo guardar, revise la informacion ingresada, e intente nuevamente"
              );
            }

            this.loading = false;
          });
      }
    }
  }
};
</script>
