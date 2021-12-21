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
        { path: '/blog/:url', name: 'post_show' ,component: require('./blog/Post.vue').default, props: true },
        { path: '/categories/:category', name: 'category_posts' ,component: require('./blog/CategoryPost.vue').default, props: true },
        { path: '/tags/:tag', name: 'tag_posts' ,component: require('./blog/TagPost.vue').default, props: true },
        { path: '*', component: require('./blog/404.vue').default },
    ],
    linkExactActiveClass: 'header-active',
    linkActiveClass: 'active-route'
});
