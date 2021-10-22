
require('./bootstrap');
window.Vue = require('vue');

// install vue
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes.js'

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'history'
  })




// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('admin-master', require('./components/admin/adminMaster.vue').default);


const app = new Vue({
    el: '#app',
    router
});
