require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Require Vue
// window.Vue = require('vue').default;

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Register Vue Components
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
});
