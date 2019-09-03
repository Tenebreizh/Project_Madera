import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },
]

export default new Router({
    routes,
});