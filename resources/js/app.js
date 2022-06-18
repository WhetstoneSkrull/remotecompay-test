require('./bootstrap');
require('../sass/app.scss')

import Vue from 'vue'
import Toasted from 'vue-toasted';

window.Vue = require('vue');
Vue.use(Toasted)


  //crud toast
  Vue.toasted.register('crudAdded', 'Added Successfully!', {
    type : 'info',
    // icon : 'check_circle'
    });


// router
import router from './routes.js';
window.router = router;
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
}).$mount('#app');