/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

 import VueRouter from "vue-router";
 Vue.use(VueRouter);

// Asignamos las routes:
  let routes = [
      {
          path: "/dashboard",
          component: require("./components/Dashboard.vue").default
      },
      {
          path: "/usuario",
          component: require("./components/Usuarios.vue").default
      },
      {
          path: "/permisos",
          component: require("./components/Profile.vue").default
      },
      {
          path: "/perfil",
          component: require("./components/Profile.vue").default
      },
      {
          path: "/salir",
          component: require("./components/Profile.vue").default
      },

  ];

// Inicializamos el Router
        const router = new VueRouter({
        routes ,// short for `routes: routes`,
        mode: 'history' // Esto evitar #/tusitio
        })


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router
});