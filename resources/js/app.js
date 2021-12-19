require('./bootstrap');
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Require Vue
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
// Register Vue Components
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

let router = new VueRouter({
    routes: [
        { path: '/home', component: require('./blog/Home.vue').default },
        { path: '/about', component: require('./blog/About.vue').default },
        { path: '/archive', component: require('./blog/Archive.vue').default },
        { path: '/contact', component: require('./blog/Contact.vue').default },
    ],
    linkExactActiveClass: 'header-active',
    linkActiveClass: 'active-route'
});

// Initialize Vue
const app = new Vue({
    router
}).$mount('#app');
