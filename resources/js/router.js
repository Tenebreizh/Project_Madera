import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue'
import Catalog from './components/pages/catalog/Index.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },

    { name: "catalog", path: '/catalog', component: Catalog },
]

export default new Router({
    routes,
});