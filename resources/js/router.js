import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue'
import Catalog          from './components/pages/catalog/Index.vue'
import Customer         from './components/pages/customer/indexCustomer.vue'
import User             from './components/pages/user/indexUser.vue'
import Configuration    from './components/pages/configuation/indexConfiguration.vue'
import ConfigurationDetail from './components/pages/configuation/detailConfiguration.vue'
import Devis            from './components/pages/quotation/indexQuotation.vue'
import CreateDevis      from './components/pages/quotation/CreateQuotation.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },

    { name: "catalog", path: '/catalog', component: Catalog },

    { name: "customer", path: '/customer', component: Customer},

    { name: "user", path: '/user', component: User},

    { name: "configuration", path: '/config', component: Configuration},

    { name: "configurationDetail", path: '/config/:id', component: ConfigurationDetail, props: true},

    { name: "quotation", path: '/devis', component: Devis},

    { name: "quotation.create", path: '/devis/create', component: CreateDevis},
]

export default new Router({
    routes,
}); 