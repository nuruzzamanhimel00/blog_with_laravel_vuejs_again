
require('./bootstrap');
window.Vue = require('vue');

//vuex integrate
import {store} from './store/store.js'

// install vue
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes.js'

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash'
  })
// import filter
import {filter} from './filters.js'






// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('admin-master', require('./components/admin/adminMaster.vue').default);
Vue.component('public-master', require('./components/public/master.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store: store,
});
