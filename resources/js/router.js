import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue'
import Catalog          from './components/pages/catalog/Index.vue'
import Customer         from './components/pages/customer/indexCustomer.vue'
import User             from './components/pages/user/indexUser.vue'
import Configuration    from './components/pages/configuation/indexConfiguration.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },

    { name: "catalog", path: '/catalog', component: Catalog },

    { name: "customer", path: '/customer', component: Customer},

    { name: "user", path: '/user', component: User},

    { name: "configuration", path: '/config', component: Configuration},
]

export default new Router({
    routes,
}); 