import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue'
import Catalog          from './components/pages/catalog/Index.vue'
import Customer         from './components/pages/customer/indexCustomer.vue'
import User             from './components/pages/user/indexUser.vue'
import Configuration    from './components/pages/configuation/indexConfiguration.vue'
import Parametre        from './components/pages/parametre/indexParametre.vue'
import Connexion        from './components/pages/connexion/indexConnexion.vue'
import CustomerShow     from './components/pages/customer/pageClient.vue'
import UserShow         from './components/pages/user/showUser.vue'
import RoleShow         from './components/pages/user/showRole.vue'
import GammeShow        from './components/pages/catalog/showGamme.vue'
import FamilleCompShow  from './components/pages/catalog/showFamComp.vue'
import FournisseurShow  from './components/pages/catalog/showSupplier.vue'
import ModuleShow       from './components/pages/catalog/showModule.vue'
import ConfigModule     from './components/pages/configuation/configModule.vue'
import ConfigurationDetail from './components/pages/configuation/detailConfiguration.vue'
import Devis            from './components/pages/quotation/indexQuotation.vue'
import CreateDevis      from './components/pages/quotation/CreateQuotation.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },

    { name: "catalog", path: '/catalog', component: Catalog },

    { name: "customer", path: '/customer', component: Customer},

    { name: "user", path: '/user', component: User},

    { name: "configuration", path: '/config', component: Configuration},

    { name: "parametre", path: '/param', component: Parametre},

    { name: "connexion", path: '/login', component: Connexion},

    { name: "customer.show", path: '/customer/{id}}', component: CustomerShow},

    { name: "user.show", path: '/user/{id}}', component: UserShow},   
    
    { name: "role.show", path: '/role/{id}}', component: RoleShow},

    { name: "gamme.show", path: '/gamme/{id}}', component: GammeShow},
    
    { name: "famcomp.show", path: '/familleComposant/{id}}', component: FamilleCompShow},

    { name: "fournisseur.show", path: '/fournisseur/{id}}', component: FournisseurShow},

    { name: "module.show", path: '/module/{id}}', component: ModuleShow},

    { name: "configModule", path: '/configModule', component: ConfigModule},


    { name: "configurationDetail", path: '/config/:id', component: ConfigurationDetail, props: true},

    { name: "quotation", path: '/devis', component: Devis},

    { name: "quotation.create", path: '/devis/create', component: CreateDevis},
]

export default new Router({
    routes,
}); 