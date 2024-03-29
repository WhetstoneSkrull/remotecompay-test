import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './erp/Home';
import Admin from './erp/Admin';

Vue.use(VueRouter);


export default new VueRouter({
    mode: 'history',
    scrollBehavior: (to, from, savedPosition) => ({ y: 0 }), 
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },

        {
            path: '/admin',
            name: 'admin',
            component: Admin
        },
    ]
});