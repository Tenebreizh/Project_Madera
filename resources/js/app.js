require('./bootstrap');
// require("bootstrap-vue-datatable");
import router from './router.js';
import VueNoty from 'vuejs-noty'
import auth from './auth/auth.js';
import DataTable from './components/layouts/DataTable.vue'

window.Vue = require('vue');
window.auth = auth;
window.$ = require('jquery')

Vue.use(VueNoty, {
    timeout: 3000,
    theme: "bootstrap-v4",
    progressBar: true,
    layout: 'topRight'
})
Vue.use(DataTable);
axios.defaults.baseURL = process.env.MIX_APP_URL;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
    router,
}).$mount('#app')
