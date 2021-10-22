
require('./bootstrap');
window.Vue = require('vue');

// install vue
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes.js'

const router = new VueRouter({
    routes // short for `routes: routes`
  })




Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
