require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Require Vue
import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Register Vue Components
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const Home = {template: '<p>Este es el HOME</p>'}
const About = {template: '<p>Este es el About</p>'}
const Archive = {template: '<p>Este es el Archive</p>'}
const Contact = {template: '<p>Este es el Contact</p>'}

const routes = [
    { path: '/home', name: 'home', component: Home },
    { path: '/about', name: 'about', component: About },
    { path: '/archive', name: 'archive', component: Archive },
    { path: '/contact', name: 'contact', component: Contact },
];

let router = new VueRouter({
    routes,
    linkExactActiveClass: 'header-active',
    linkActiveClass: 'active-route'
});

// Initialize Vue
const app = new Vue({
    el: '#app',
    router
});
