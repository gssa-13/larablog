// Require Vue
import Vue from 'vue';

import VueRouter from 'vue-router'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/home', name: 'home' ,component: require('./blog/Home.vue').default },
        { path: '/about', name: 'about' ,component: require('./blog/About.vue').default },
        { path: '/archive',name: 'archive' , component: require('./blog/Archive.vue').default },
        { path: '/contact', name: 'contact', component: require('./blog/Contact.vue').default },
        { path: '*', component: require('./blog/404.vue').default },
    ],
    linkExactActiveClass: 'header-active',
    linkActiveClass: 'active-route'
});
