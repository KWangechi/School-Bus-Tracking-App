/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import axios from "axios";
import router from "./router";
import store from "./store/auth/index";
import Vue from "vue";
// import './index.css'


require("./bootstrap");

// window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component("auth-component", () => import("./app/auth/index"));

// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );
// Vue.component("index-component", () => import("./app/auth/index"));
// Vue.component(
//     "dashboard-component",
//     require("./components/DashboardComponent.vue").default
// );
// Vue.component("auth")

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//  app.config.globalProperties.$axios = axios;
//  app.use(router);
//  const vuestore = createStore(store);
//  app.use(vuestore);

const app = new Vue({
    el: "#app",
    router,
    store,
});
