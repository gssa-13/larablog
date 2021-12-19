require('./bootstrap');
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';

import router from './routes';
// Initialize Vue
const app = new Vue({
    router
}).$mount('#app');
