<template>
    <div>
        <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Buscar"
            single-line
            hide-details
        ></v-text-field>
        <v-data-table
            :headers="headers"
            :items="items"
            :items-per-page="10"
            :search="search"
            dense
            class="elevation-1"
        >
            <template v-slot:item.state="{ item }">
                <v-select
                    dense
                    outlined
                    :value="item.state"
                    :items="states"
                    :loading="loading"
                    :disabled="disabled"
                    @change="onStateChange(item, $event)"
                ></v-select>
            </template>
        </v-data-table>
    </div>
</template>
<script>
 export default {
     props: {
         getRoute: {
             type: String,
             required: true
         },
         stateUpdateRoute: {
             type: String,
             required: true
         },
     },
     data() {
         return {
             search: "",
             headers: [
                 { text: "Nombre", value: "user.name" },
                 { text: "Correo", value: "user.email" },
                 { text: "Contacto", value: "user.phone" },
                 { text: "Nº Orden", value: "id" },
                 { text: "Estado", value: "state" },
             ],
             loading: false,
             disabled: false,
             items: [],
             states: [
                 "Nueva", "En Proceso", "Finalizada"
             ],
         }
     },
     mounted() {
         const self = this;
         this.interval = setInterval(() => {
             self.getData();
         }, 3000);
     },
     methods: {
         getData() {
             axios.get(this.getRoute).then((resp) => {
                 this.items = resp.data;
             });
         },
         onStateChange(item, event) {
             this.loading = true;
             this.disabled = true;
             const orden_trabajo_id = item.id;
             const estado = event;
             axios.post(
                 this.stateUpdateRoute,
                 { orden_trabajo_id, estado }
             ).then((resp) => {
                this.loading = false;
                this.disabled = false
             });
         }
     }
 }
</script>
