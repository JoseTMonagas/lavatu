<template>
  <div>
    <base-table :headers="headers" :items="items"></base-table>
  </div>
</template>
<script>
import BaseTable from "./BaseTable.vue";
export default {
  components: {
    "base-table": BaseTable
  },
  props: {
    getRoute: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      search: "",
      headers: [
        { text: "Fecha", value: "created_at" },
        { text: "Nº Orden", value: "id" },
        { text: "Nombre", value: "user.name" },
        { text: "Total", value: "total" },
        { text: "Estado", value: "state" },
        { text: "Acciones", value: "actions" }
      ],
      loading: false,
      disabled: false,
      items: [],
      states: ["Nueva", "En Proceso", "Finalizada"]
    };
  },
  mounted() {
    const self = this;
    this.interval = setInterval(() => {
      self.getData();
    }, 3000);
  },
  methods: {
    getData() {
      axios.get(this.getRoute).then(resp => {
        this.items = resp.data;
      });
    }
  }
};
</script>
