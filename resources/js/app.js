require('./bootstrap');
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';

import router from './routes';

Vue.component('navigation-bar', require('./components/blog/NavigationBar.vue').default);
Vue.component('posts-list', require('./components/blog/PostsList.vue').default);
Vue.component('post-list-item', require('./components/blog/PostListItem.vue').default);
Vue.component('post-header', require('./components/blog/PostHeader.vue').default);
Vue.component('post-footer', require('./components/blog/PostFooter.vue').default);
Vue.component('category-link', require('./components/blog/CategoryLink.vue').default);
Vue.component('post-link', require('./components/blog/PostLink.vue').default);

// Initialize Vue
const app = new Vue({
    router
}).$mount('#app');
