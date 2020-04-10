/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

// ListBox Select - Referencia : https://vue-select.org/guide/install.html#yarn-npm
import vSelect from "vue-select";
Vue.component("v-select", vSelect);

//  TEXTOS A CAPITALIZE -  REFERENCIA : https://vuejs.org/v2/guide/filters.html
Vue.filter("capitalize", function(text) {
    if (!text) return "";
    text = text.toString();
    return text.charAt(0).toUpperCase() + text.slice(1);
});

// TEXTOS A MAYUSCULAS
Vue.filter("mayusculas", function(text) {
    if (!text) return "";
    text = text.toString();
    return text.toUpperCase();
});

//VFORM - COMPONENTE QUE PERMITE TRABAJAR CON LOS FORMUNLARIO - REFERENCIA : https://github.com/wilfredofermin/vform
window.Form = Form;
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import VueRouter from "vue-router";
Vue.use(VueRouter);

import SweetModal from "sweet-modal-vue/src/plugin.js";
Vue.use(SweetModal);

// Asignamos las routes:
let routes = [
    {
        path: "/dashboard",
        component: require("./components/Dashboard.vue").default
    },
    {
        path: "/nuevo-ingreso",
        component: require("./components/NuevoIngreso.vue").default
    },
    {
        path: "/perfil",
        component: require("./components/Profile.vue").default
    },
    {
        path: "/miembros",
        component: require("./components/Miembros.vue").default
    },
    {
        path: "/usuariosactivos",
        component: require("./components/Activos.vue").default
    }
];

// Inicializamos el Router
const router = new VueRouter({
    routes, // short for `routes: routes`,
    mode: "history" // Esto evitar #/tusitio
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router
});
