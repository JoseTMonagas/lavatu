/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import Vuetify from "vuetify";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(Vuetify);
Vue.component("reserva-hora", require("./components/ReservaHora.vue").default);
Vue.component("img-dialog", require("./components/ImgDlg.vue").default);
Vue.component("pop-up", require("./components/PopUp.vue").default);
Vue.component("base-table", require("./components/BaseTable.vue").default);
Vue.component(
  "orden-trabajo",
  require("./components/OrdenTrabajo.vue").default
);
Vue.component("control-ot", require("./components/ControlOT.vue").default);
Vue.component("modulo-venta", require("./components/ModuloVenta.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: "#app",
  vuetify: new Vuetify()
});
