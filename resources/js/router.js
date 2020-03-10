import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent     from './components/ExampleComponent.vue'
import Catalog              from './components/pages/catalog/Index.vue'
import Customer             from './components/pages/customer/indexCustomer.vue'
import User                 from './components/pages/user/indexUser.vue'
import Configuration        from './components/pages/configuation/indexConfiguration.vue'
import CoveringShow         from './components/pages/configuation/CoveringShow.vue'
import IsolatorShow         from './components/pages/configuation/IsolationShow.vue'
import ExternalFinitionShow from './components/pages/configuation/ExternalFinitionShow.vue'
import WindowsFrameShow     from './components/pages/configuation/WindowFrameShow.vue'
import Parametre            from './components/pages/parametre/indexParametre.vue'
import Connexion            from './components/pages/connexion/indexConnexion.vue'
import CustomerShow         from './components/pages/customer/pageClient.vue'
import UserShow             from './components/pages/user/showUser.vue'
import UserConnectedShow    from './components/pages/user/showUserConnected.vue'
import RoleShow             from './components/pages/user/showRole.vue'
import GammeShow            from './components/pages/catalog/showGamme.vue'
import FamilleCompShow      from './components/pages/catalog/showFamComp.vue'
import FournisseurShow      from './components/pages/catalog/showSupplier.vue'
import ModuleShow           from './components/pages/catalog/showModule.vue'
import ConfigModule         from './components/pages/configuation/configModule.vue'
import ConfigurationDetail  from './components/pages/configuation/detailConfiguration.vue'
import Devislists           from './components/pages/quotation/indexQuotation.vue'
import CreateDevis          from './components/pages/quotation/CreateQuotation.vue'
import ShowDevis            from './components/pages/quotation/showQuotation.vue'
import ArticleShow          from './components/pages/catalog/showArticle.vue'
import Project              from './components/pages/project/indexProject.vue'

const routes = [
    { name: "home", path: '/', component: ExampleComponent },

    { name: "catalog", path: '/catalog', component: Catalog },

    { name: "customer", path: '/customer', component: Customer},

    { name: "user", path: '/user', component: User},

    { name: "configuration", path: '/config', component: Configuration},

    { name: "parametre", path: '/param', component: Parametre},

    { name: "connexion", path: '/login', component: Connexion},

    { name: "customer.show", path: '/customer/:id', component: CustomerShow},

    { name: "user.show", path: '/user/:id', component: UserShow}, 

    { name: "userConnected.show", path: '/userConnected/:id', component: UserConnectedShow},    
    
    { name: "role.show", path: '/role/:id', component: RoleShow},

    { name: "gamme.show", path: '/gamme/:id', component: GammeShow},
    
    { name: "famcomp.show", path: '/familleComposant/:id', component: FamilleCompShow},

    { name: "fournisseur.show", path: '/fournisseur/:id', component: FournisseurShow},

    { name: "module.show", path: '/module/:id', component: ModuleShow},

    { name: "configModule", path: '/configModule', component: ConfigModule},

    { name: "configurationDetail", path: '/config/:id', component: ConfigurationDetail, props: true},

    { name: "quotationlist", path: '/devis/:id', component: Devislists},

    { name: "quotation.edit", path: '/devis/:id', component: CreateDevis},

    { name: "quotation.show", path: '/devis/:id', component: ShowDevis},

    { name: "article.show", path: '/article/:id', component: ArticleShow},

    { name: "isolator.show", path: '/isolator/:id', component: IsolatorShow},

    { name: "covering.show", path: '/covering/:id', component: CoveringShow},

    { name: "WindowsFrame.show", path: '/WindowsFrame/:id', component: WindowsFrameShow},

    { name: "ExternalFinition.show", path: '/ExternalFinition/:id', component: ExternalFinitionShow},

    { name: "project", path: '/Project', component: Project}
]

export default new Router({
    routes,
}); 