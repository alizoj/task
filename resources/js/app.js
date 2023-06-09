import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: Home },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});
