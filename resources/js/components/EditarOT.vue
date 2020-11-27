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
    <div class="row">
      <div class="col-md-8 mx-auto">
        <b>Observacion:</b>
        <v-text-field
          outlined
          dense
          :readonly="!isEditing"
          v-model="editOrden.observacion"
        ></v-text-field>
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
        observacion: null
      }
    };
  },
  created() {
    this.editOrden.estado = this.ordenTrabajo.state;
    this.editOrden.cargas = this.ordenTrabajo.cargas;
    this.editOrden.planchas = this.ordenTrabajo.planchas;
    this.editOrden.observacione = this.ordenTrabajo.observacion;
  },
  methods: {
    save() {
      const state = this.editOrden.estado;
      const cargas = this.editOrden.cargas;
      const planchas = this.editOrden.planchas;
      const observacion = this.editOrden.observacion;
      axios
        .put(this.route, {
          state,
          cargas,
          planchas,
          observacion
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
    }
  }
};
</script>
