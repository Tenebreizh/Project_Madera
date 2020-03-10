<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                    <li class="nav-item">
                        <a class="nav-item nav-link active" id="nav-gammes-tab" data-toggle="tab" href="#nav-gammes" role="tab" aria-controls="nav-gammes" aria-selected="true">Gammes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-composants-tab" data-toggle="tab" href="#nav-composants" role="tab" aria-controls="nav-composants" aria-selected="false">Famille Composants</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-fournisseurs-tab" data-toggle="tab" href="#nav-fournisseurs" role="tab" aria-controls="nav-fournisseurs" aria-selected="false">Fournisseurs</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-modules-tab" data-toggle="tab" href="#nav-modules" role="tab" aria-controls="nav-modules" aria-selected="false">Modules</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-article-tab" data-toggle="tab" href="#nav-article" role="tab" aria-controls="nav-article" aria-selected="false">Articles</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#AddGamme">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="ranges" :columns="columnsRange" :actions="actionsGamme" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-composants" role="tabpanel" aria-labelledby="nav-composants-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#AddFamComp">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="famcomps" :columns="columnsComponents" :actions="actionsFamComp" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-fournisseurs" role="tabpanel" aria-labelledby="nav-fournisseurs-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#AddSupplier">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="fournisseurs" :columns="columnSuppliers" :actions="actionsFournisseur" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-modules" role="tabpanel" aria-labelledby="nav-modules-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#AddModule">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="modules" :columns="columnsModules" :actions="actionsModule" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-article" role="tabpanel" aria-labelledby="nav-article-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success" data-toggle="modal" data-target="#AddArticle">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="columnsArticles" :actions="actionsArticle" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal gammes -->
        <div class="modal fade bd-example-modal-lg" id="AddGamme" tabindex="-1" role="dialog" aria-labelledby="AddGammeLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'une gamme</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'une gamme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="reference">Référence:</label>
                                    <input type="text" class="form-control" id="reference1" name="reference" v-model="range.reference">
                                </div>
                                <div class="col form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" id="description1" v-model="range.description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="external_finition">Finition extérieur:</label>
                                    <select name="external_finition" class="form-control" v-model="range.external_finition_id">
                                        <option v-for="(external_finition, key) in external_finitions" :value="external_finition.id" :key="key"> {{ external_finition.reference }} </option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="isolation">Type d'isolation:</label>
                                    <select name="isolation" class="form-control" v-model="range.insulator_id">
                                        <option v-for="(insulator, key) in insulators" :value="insulator.id" :key="key"> {{ insulator.reference }} </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="covering">Type de couverture:</label>
                                    <select name="covering" class="form-control" v-model="range.covering_id">
                                        <option v-for="(covering, key) in coverings" :value="covering.id" :key="key"> {{ covering.reference }} </option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="window_frame">Qualité huisserie:</label>
                                    <select name="window_frame" class="form-control" v-model="range.window_frame_id">
                                        <option v-for="(windowFrame, key) in windowFrames" :value="windowFrame.id" :key="key"> {{ windowFrame.reference }} </option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col form-group">
                                    <label for="regle">Règle:</label>
                                    <input type="text" class="form-control" id="regle" name="regle" v-model="range.rule">
                                </div>
                                <div class="col form-group">
                                    <label for="label">Label:</label>
                                    <input type="text" class="form-control" id="label" name="label" v-model="range.label">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createGamme()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateGamme()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal famille de composant -->
        <div class="modal fade bd-example-modal-lg" id="AddFamComp" tabindex="-1" role="dialog" aria-labelledby="AddFamCompLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddFamCompLabel">Ajout d'une famille de composant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference2" name="reference" v-model="famcomp.name">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description2" v-model="famcomp.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createFamComp()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateFamComp()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal fournisseur -->
        <div class="modal fade bd-example-modal-lg" id="AddSupplier" tabindex="-1" role="dialog" aria-labelledby="AddSupplierLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddSupplierLabel">Ajout d'un fournisseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" v-model="fournisseur.firstname">
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" v-model="fournisseur.lastname">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">N°:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" v-model="fournisseur.street_number">
                                </div>
                                <div class="col form-group">
                                    <label for="street">Adresse:</label>
                                    <input type="text" class="form-control" id="street" name="street" v-model="fournisseur.street">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="cp">CP:</label>
                                    <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000" v-model="fournisseur.zipcode">
                                </div>
                                <div class="col form-group">
                                    <label for="city">Ville:</label>
                                    <input type="text" class="form-control" id="city" name="city" v-model="fournisseur.city">
                                </div>
                                <div class="col form-group">
                                    <label for="country">Pays:</label>
                                    <input type="text" class="form-control" id="country" name="country" v-model="fournisseur.country">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="phone">Téléphone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00" v-model="fournisseur.phone">
                                </div>
                                <div class="col form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="number" class="form-control" id="fax" name="fax"  placeholder="00 00 00 00 00" v-model="fournisseur.fax">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr" v-model="fournisseur.email">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createFournisseur()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateFournisseur()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal module -->
        <div class="modal fade bd-example-modal-lg" id="AddModule" tabindex="-1" role="dialog" aria-labelledby="AddModuleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddModuleLabel">Ajout d'une huisserie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference3" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description3"></textarea>
                            </div>
                            <div class="col form-group">
                                <label for="tva">TVA:</label>
                                <input type="text" class="form-control" id="tva" name="tva">
                            </div>
                            <div class="col form-group">
                                <label for="price">Prix:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="price">€</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal article -->
        <div class="modal fade bd-example-modal-lg" id="AddArticle" tabindex="-1" role="dialog" aria-labelledby="AddArticleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddArticleLabel">Ajout d'un article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference4" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description4"></textarea>
                            </div>
                            <div class="m-4">
                                <a href="#" data-toggle="modal" data-target="#AddSuppliers" class="button"><i class="fa fa-plus"></i>Ajouter un fournisseur</a>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="ModalAddSuppliers"  :actions="actionsSuppliers" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal fournisseurs -->
        <div class="modal fade bd-example-modal-lg" id="AddSuppliers" tabindex="-1" role="dialog" aria-labelledby="AddSuppliersLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddSuppliersLabel">Ajout d'un fournisseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="form-group">
                                <label for="roles">Fournisseurs:</label>
                                <select name="roles" class="form-control"></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import moment from "moment";

export default {
    data() {
        return {
            loadingData: false,
            edit:false,
            columnsRange: [
                {name: "reference",         th: "Référence"},
                {name: "external_finition", th: "Finition extérieure"},
                {name: "insulator",         th: "Type d'isolant"},
                {name: "covering",          th: "Type de couverture"},
                {name: "window_frame",      th: "Qualité huisserie"},
                {name: "rule",              th: "Règles"},
            ],
            columnsComponents: [
                {name: "name",              th: "Nom de la famille"},
                {name: "description",       th: "Description"},
            ],
            columnSuppliers: [
                {name: "firstname", th: "Nom"},
                {name: "lastname", th: "Prénom"},
                {name: "street", th: "Adresse"},
                {name: "email", th: "Email"},
                {name: "phone", th: "Téléphone"},
                {name: "fax", th: "Fax"},
            ],
            ModalAddSuppliers: [
                {name: "firstname", th: "Nom"},
                {name: "lastname", th: "Prénom"},
                {name: "email", th: "Email"},
            ],
            columnsModules: [
                {name: "name", th: "Référence"},
                {name: "description", th: "Description"},
                {name: "tva", th: "TVA"},
                {name: "price", th: "Prix"},
            ],
            columnsArticles: [
                {name: "name", th: "Référence"},
                {name: "description", th: "Description"},
                {name: "suppliers", th: "Fournisseur"},
            ],

            comments: [],
            ranges:[],
            range:{
                covering_id:'',
                insulator_id:'',
                external_finition_id:'',
                window_frame_id:'',
                label:'',
                description:'',
                reference:'',
                rule:'',
            },

            famcomps:[],
            famcomp:{
                name:'',
                description:'',
            },
            fournisseurs:[],
            fournisseur:{
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                city:'',
                country:'',
                phone:'',
                fax:'',
                email:'',
            },
            modules:[],
            module:{

            },
            articles:[],
            article:{

            },
            external_finitions:[],
            external_finition:{
                label:'',
                description:'',
                reference:''
            },
            insulators:[],
            insulator:{
                label:'',
                description:'',
                reference:''
            },
            coverings:[],
            covering:{
                label:'',
                description:'',
                reference:''
            },

            windowFrames:[],
            windowFrame:{
                label:'',
                description:'',
                reference:''
            },

            actionsGamme: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"gamme.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit=true;
                    this.range = this.ranges[index];
                    $("#AddGamme").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous supprimer ce gamme ?")){
                        this.deleteGamme(row.id)
                    }
                }},
            ],
            actionsFamComp: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"famcomp.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit=true;
                    this.famcomp = this.famcomps[index];
                    $("#AddFamComp").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous supprimer cette famille de composant ?")){
                        this.deleteFamComp(row.id)
                    }
                }},
            ],
            actionsFournisseur: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"fournisseur.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit=true;
                    this.fournisseur = this.fournisseurs[index];
                    $("#AddSupplier").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous supprimer ce fournisseur ?")){
                        this.deleteFournisseur(row.id)
                    }
                }},
            ],
            actionsModule: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"module.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit=true;
                    this.module = this.modules[index];
                    $("#AddModule").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous supprimer ce module ?")){
                        this.deleteModule(row.id)
                    }
                }},
            ],
            actionsArticle: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"article.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous supprimer ce article ?")){
                        this.deleteAricle(row.id)
                    }
                }},
            ],
            actionsSuppliers: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer ce fourisseur de cette article ?")){
                        // this.dele(row.id)
                    }
                }},
            ]
        }
    },

    methods:{

        //Tools
        getFinitions(){
            this.loadingData = true
            axios.get("/api/externalFinitions")
            .then(response => {
                this.external_finitions = response.data
                this.loadingData = false
            })
        },

        getinsulators(){
            this.loadingData = true
            axios.get("/api/insulators")
            .then(response => {
                this.insulators = response.data
                this.loadingData = false
            })
        },

        getCoverings(){
            this.loadingData = true
            axios.get("/api/coverings")
            .then(response => {
                this.coverings = response.data
                this.loadingData = false
            })
        },

        getwindowFrames(){
            this.loadingData = true
            axios.get("/api/windowFrames")
            .then(response => {
                this.windowFrames = response.data
                this.loadingData = false
            })
        },

        // GAMMES
        getGammes(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.ranges = response.data
                this.loadingData = false
            })
        },

        createGamme(){
            axios.post('/api/range', this.range)
            .then(response => {
                this.ranges.push(response.data)
                $("#AddGamme").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateGamme(){
            axios.put('/api/range/'+this.range.id,this.range)
            .then(response => {
                $("#AddGamme").modal("hide");
                this.edit = false;
                this.getGammes()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteGamme(id){
            axios.delete('/api/range/'+id)
            .then(response => {
                this.getGammes()
                this.$noty.success("Suppression réusite")
            })
        },

        // Famille compossant
        getFamComps(){
            this.loadingData = true
            axios.get("/api/component_types")
            .then(response => {
                this.famcomps = response.data
                this.loadingData = false
            })
        },

        createFamComp(){
            axios.post('/api/component_type', this.famcomp)
            .then(response => {
                this.famcomps.push(response.data)
                $("#AddFamComp").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateFamComp(){
            axios.put('/api/component_type/'+this.famcomp.id,this.famcomp)
            .then(response => {
                $("#AddFamComp").modal("hide");
                this.edit = false
                this.getFamComps()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteFamComp(id){
            axios.delete('/api/component_type/'+id)
            .then(response => {
                this.getFamComps()
                this.$noty.success("Suppression réusite")
            })
        },


        // Fournisseurs
        getFournisseurs(){
            this.loadingData = true
            axios.get("/api/suppliers")
            .then(response => {
                this.fournisseurs = response.data
                this.loadingData = false
            })
        },

        createFournisseur(){
            axios.post('/api/supplier', this.fournisseur)
            .then(response => {
                this.fournisseurs.push(response.data)
                $("#AddSupplier").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateFournisseur(){
            axios.put('/api/supplier/'+this.fournisseur.id,this.fournisseur)
            .then(response => {
                $("#AddSupplier").modal("hide");
                this.edit = false;
                this.getFournisseurs()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteFournisseur(id){
            axios.delete('/api/supplier/'+id)
            .then(response => {
                this.getFournisseurs()
                this.$noty.success("Suppression réusite")
            })
        },

        //Modules
        getModules(){
            this.loadingData = true
            axios.get("/api/modules")
            .then(response => {
                this.modules = response.data
                this.loadingData = false
            })
        },

        createModule(){
            axios.post('/api/module', this.module)
            .then(response => {
                this.modules.push(response.data)
                $("#AddModule").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateModule(){
            axios.put('/api/module/'+this.module.id,this.module)
            .then(response => {
                $("#AddModule").modal("hide");
                this.edit = false;
                this.getModules()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteModule(id){
            axios.delete('/api/module/'+id)
            .then(response => {
                this.getModules()
                this.$noty.success("Suppression réusite")
            })
        },

        //Article
        getAricles(){
            this.loadingData = true
            axios.get("/api/Aricles")
            .then(response => {
                this.aricles = response.data
                this.loadingData = false
            })
        },

        createAricle(){
            axios.post('/api/Aricle', this.Aricle)
            .then(response => {
                this.aricles.push(response.data)
                $("#AddUser").modal("hide");
            })
        },

        updateAricle(){
            axios.put('/api/Aricle/'+this.Aricle.id,this.Aricle)
            .then(response => {
                $("#AddUser").modal("hide");
                this.edit = false;
                this.getAricles()
            })
        },

        deleteAricle(id){
            axios.delete('/api/Aricle/'+id)
            .then(response => {
                this.getAricles()
            })
        },

        GetAllValue(){
            this.getFinitions(),
            this.getinsulators(),
            this.getCoverings(),
            this.getwindowFrames(),
            this.getGammes(),
            this.getFamComps(),
            this.getFournisseurs(),
            this.getModules()
        }

    },

    mounted() {
        this.GetAllValue()
    }
}
</script>

<style>

</style>