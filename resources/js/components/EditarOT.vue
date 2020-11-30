<template>
  <div class="container-fluid">
    <v-btn v-if="!isEditing" @click="isEditing = true">Editar</v-btn>
    <v-btn v-if="isEditing" color="warning" @click="isEditing = false"
      >Cancelar</v-btn
    >
    <v-btn v-if="isEditing" color="success" @click="save">Guardar</v-btn>
    <v-divider></v-divider>
    <div class="row">
      <div
        class="col-md-3 d-inline-flex flex-column border-right justify-content-between"
      >
        <span>
          <b>Nombre:</b>
          {{ clienteFullName }}
        </span>
        <span>
          <b>Telefono:</b>
          {{ ordenTrabajo.user.phone }}
        </span>
        <span>
          <b>Correo:</b>
          {{ ordenTrabajo.user.email }}
        </span>
        <span>
          <b>Direccion:</b>
          {{ ordenTrabajo.user.address }}
        </span>
        <span>
          <b>Sector:</b>
          {{ ordenTrabajo.user.sector }}
        </span>
      </div>
      <div class="col-md-5 d-inline-flex flex-column border-right">
        <span class="form-row">
          <b class="col-md-3">Estado Transaccion:</b>
          <p class="col-md">
            {{ estadoTransaccion }}
          </p>
        </span>
        <span class="form-row">
          <b class="col-md-3">Estado Orden:</b>
          <v-select
            v-if="isEditing"
            :disabled="!isEditing"
            class="col-md-7"
            outlined
            dense
            v-model="editOrden.estado"
            :items="items.estadosOrden"
          ></v-select>
          <p v-if="!isEditing" class="col-md">
            {{ estadoOrden }}
          </p>
        </span>
        <span class="form-row">
          <b class="col-md-3">Cantidad de Cargas:</b>
          <v-text-field
            v-if="isEditing"
            v-model="editOrden.cargas"
            :disabled="!isEditing"
            outlined
            dense
            type="number"
            class="col-md-7"
          >
          </v-text-field>
          <p v-if="!isEditing" class="col-md">
            {{ cantidadCargas }}
          </p>
        </span>
        <span class="form-row">
          <b class="col-md-3">Prendas a Planchar:</b>
          <v-text-field
            v-if="isEditing"
            v-model="editOrden.planchas"
            :disabled="!isEditing"
            outlined
            dense
            type="number"
            class="col-md-7"
          >
          </v-text-field>
          <p v-if="!isEditing" class="col-md">
            {{ cantidadPlanchas }}
          </p>
        </span>
      </div>
      <div class="col-md-4 d-inline-flex flex-column justify-content-between">
        <span>
          <b>Subtotal Cargas:</b>
          {{ subtotalCargas }}
        </span>
        <span>
          <b>Subtotal Planchado:</b>
          {{ subtotalPlanchado }}
        </span>
        <span class="form-row">
          <b class="col-md-3">Descuento:</b>
          <v-select
            v-if="isEditing"
            class="col-md-4"
            outlined
            dense
            v-model="editOrden.tipoDescuento"
            :items="items.tiposDescuento"
          ></v-select>
          <v-text-field
            v-if="isEditing"
            v-model="editOrden.valorDescuento"
            :disabled="!isEditing"
            outlined
            dense
            type="number"
            class="col-md-3"
          >
          </v-text-field>
          <p v-if="!isEditing" class="col-md">
            {{ descuento }}
          </p>
        </span>
        <span>
          <b>Total:</b>
          {{ total }}
        </span>
      </div>
    </div>
    <div class="row border-top">
      <div class="col-md-4 border-right">
        <b>Observacion:</b>
        <v-textarea
          outlined
          dense
          auto-grow
          :readonly="!isEditing"
          v-model="editOrden.observacion"
        ></v-textarea>
      </div>
      <div class="col-md">
        <div
          v-if="isEditing"
          class="form-row align-items-baseline justify-content-center"
        >
          <v-autocomplete
            class="col-md-3"
            outlined
            dense
            label="Ropa"
            :items="ropas"
            item-text="name"
            item-value="id"
            v-model="newItem.ropa_id"
          ></v-autocomplete>
          <v-text-field
            class="col-md-3"
            outlined
            dense
            label="Cantidad"
            v-model="newItem.cantidad"
          ></v-text-field>
          <v-checkbox
            v-model="newItem.planchar"
            class="col-md-2"
            label="Planchado"
          ></v-checkbox>
          <v-btn class="col-md-1" @click="agregarItem">Agregar</v-btn>
        </div>
        <v-simple-table fixed-header height="300">
          <template v-slot:default>
            <thead>
              <tr>
                <th>
                  <b>Item</b>
                </th>
                <th>
                  <b>Cantidad</b>
                </th>
                <th>
                  <b>Planchado</b>
                </th>
                <th v-if="isEditing">
                  <b>Eliminar</b>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(ropa, index) in editOrden.ropas" :key="index">
                <td>{{ getRopaNombreById(ropa.ropa_id) }}</td>
                <td>{{ ropa.cantidad }}</td>
                <td>{{ ropa.planchar ? "Si" : "No" }}</td>
                <td v-if="isEditing">
                  <v-btn
                    depressed
                    color="error"
                    @click="eliminarItem(ropa.ropa_id)"
                  >
                    Borrar
                  </v-btn>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    ordenTrabajo: {
      type: Object,
      required: true
    },
    ropas: {
      type: Array,
      required: true
    },
    route: {
      type: String,
      required: true
    }
  },
  computed: {
    clienteFullName() {
      return this.ordenTrabajo.user.name + " " + this.ordenTrabajo.user.surname;
    },
    estadoTransaccion() {
      let transaccion = JSON.parse(this.ordenTrabajo.result);
      if (transaccion != null) {
        if (transaccion.responseCode == 0) {
          return "Exitosa";
        } else {
          return "Fallida";
        }
      }
      return "No Completada o No Aplica";
    },
    estadoOrden() {
      if (this.isEditing) {
      }
      return this.ordenTrabajo.state;
    },
    cantidadCargas() {
      if (this.isEditing) {
      }
      return this.ordenTrabajo.cargas;
    },
    cantidadPlanchas() {
      if (this.isEditing) {
      }
      return this.ordenTrabajo.planchas;
    },
    subtotalCargas() {
      if (this.isEditing) {
        return this.editOrden.cargas * 8700;
      }
      return this.ordenTrabajo.subtotalCargas;
    },
    subtotalPlanchado() {
      if (this.isEditing) {
        let price = 700;
        if (this.editOrden.planchas > 5) {
          price = 500;
        }
        return this.editOrden.planchas * price;
      }
      return this.ordenTrabajo.subtotalPlanchado;
    },
    descuento() {
      if (this.isEditing) {
        switch (this.editOrden.tipoDescuento) {
          case "NONE":
            return 0;
            break;
          case "FIXED":
            return this.valorDescuento;
            break;
          case "PERCENT":
            return (
              this.subtotalCargas +
              this.subtotalPlanchado * (this.valorDescuento / 100)
            );
        }
      }
      return this.ordenTrabajo.descuento;
    },
    total() {
      if (this.isEditing) {
        return this.subtotalCargas + this.subtotalPlanchado + this.descuento;
      }
      return this.ordenTrabajo.total;
    }
  },
  data() {
    return {
      isEditing: false,
      items: {
        estadosOrden: [
          { text: "Nueva", value: "Nueva" },
          { text: "En Proceso", value: "En Proceso" },
          { text: "Finalizada", value: "Finalizada" }
        ],
        tiposDescuento: [
          { text: "Ninguno", value: "NONE" },
          { text: "Porcentual", value: "PERCENT" },
          { text: "Valor Fijo", value: "FIXED" }
        ]
      },
      editOrden: {
        estado: null,
        cargas: null,
        planchas: null,
        tipoDescuento: "NONE",
        valorDescuento: null,
        observacion: null,
        ropas: []
      },
      newItem: {
        ropa_id: null,
        cantidad: null,
        planchar: false
      }
    };
  },
  created() {
    this.editOrden.estado = this.ordenTrabajo.state;
    this.editOrden.cargas = this.ordenTrabajo.cargas;
    this.editOrden.planchas = this.ordenTrabajo.planchas;
    this.editOrden.observacion = this.ordenTrabajo.observacion;
    for (const index in this.ordenTrabajo.ropas) {
      const ropa = this.ordenTrabajo.ropas[index];
      const ropa_id = ropa.id;
      const cantidad = ropa.pivot.cantidad;
      const planchar = ropa.pivot.planchar;
      this.editOrden.ropas.push({
        ropa_id,
        cantidad,
        planchar
      });
    }
  },
  methods: {
    save() {
      const state = this.editOrden.estado;
      const cargas = this.editOrden.cargas;
      const planchas = this.editOrden.planchas;
      const observacion = this.editOrden.observacion;
      const ropas = this.editOrden.ropas;
      axios
        .put(this.route, {
          state,
          cargas,
          planchas,
          observacion,
          ropas
        })
        .catch(function(error) {
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
          console.log(error.config);
        })
        .then(resp => {
          if (resp.status == 200) {
            alert("Guardado");
          }
        });
    },
    getRopaNombreById(ropaId) {
      const found = this.ropas.find(ropa => ropa.id == ropaId);

      if (found) {
        return found.name;
      }

      console.error(found);
      return "";
    },
    agregarItem() {
      if (this.newItem.ropa_id == null || this.newItem.cantidad <= 0) return;
      if (
        this.editOrden.ropas.some(ropa => ropa.ropa_id == this.newItem.ropa_id)
      )
        return;

      this.editOrden.ropas.push(this.newItem);
      this.newItem = {
        ropa_id: null,
        cantidad: 0,
        planchar: false
      };
    },
    eliminarItem(ropaId) {
      const index = this.editOrden.ropas.findIndex(
        ropa => ropa.ropa_id == ropaId
      );
      if (index >= 0) {
        this.editOrden.ropas.splice(index, 1);
      }
    }
  }
};
</script>
