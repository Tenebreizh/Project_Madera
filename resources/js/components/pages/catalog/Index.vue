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
                                <DataTable :data="gammes" :columns="columnsRange" :actions="actionsGamme" :index="false" :loading="loadingData"></DataTable>
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
                                <DataTable :data="comments" :columns="columnsComponents" :actions="actionsFamComp" :index="false" :loading="loadingData"></DataTable>
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
                                <DataTable :data="comments" :columns="columnSuppliers" :actions="actionsFournisseur" :index="false" :loading="loadingData"></DataTable>
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
                                <DataTable :data="comments" :columns="columnsModules" :actions="actionsModule" :index="false" :loading="loadingData"></DataTable>
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
                                <DataTable :data="ranges" :columns="columnsArticles" :actions="actionsArticle" :index="false" :loading="loadingData"></DataTable>
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
                        <h5 class="modal-title" id="AddGammeLabel">Ajout d'une gamme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="reference">Référence:</label>
                                    <input type="text" class="form-control" id="reference" name="reference">
                                </div>
                                <div class="col form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="external_finition">Finition extérieur:</label>
                                    <select name="external_finition" class="form-control"></select>
                                </div>
                                <div class="col form-group">
                                    <label for="isolation">Type d'isolation:</label>
                                    <select name="isolation" class="form-control"></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="covering">Type de couverture:</label>
                                    <select name="covering" class="form-control"></select>
                                </div>
                                <div class="col form-group">
                                    <label for="window_frame">Qualité huisserie:</label>
                                    <select name="window_frame" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col form-group">
                                <label for="regle">Règle:</label>
                                <input type="text" class="form-control" id="regle" name="regle">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
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
                                <input type="text" class="form-control" id="reference" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
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
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">N°:</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                                <div class="col form-group">
                                    <label for="street">Adresse:</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="cp">CP:</label>
                                    <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000">
                                </div>
                                <div class="col form-group">
                                    <label for="city">Ville:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col form-group">
                                    <label for="country">Pays:</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="phone">Téléphone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00">
                                </div>
                                <div class="col form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="number" class="form-control" id="fax" name="fax"  placeholder="00 00 00 00 00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
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
                                <input type="text" class="form-control" id="reference" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
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
                                <input type="text" class="form-control" id="reference" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
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

            },
            famcomps:[],
            fournisseurs:[],
            modules:[],
            articles:[],

            actionsGamme: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"gamme.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ],
            actionsFamComp: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"famcomp.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ],
            actionsFournisseur: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"fournisseur.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ],
            actionsModule: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"module.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
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
                    alert("Delete: " + row.id);
                }},
            ],
            actionsSuppliers: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ]
        }
    },

    mathods:{
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
                $("#AddUser").modal("hide");
            })
        },

        updateGamme(){
            axios.put('/api/range/'+this.range.id,this.range)
            .then(response => {
                $("#AddUser").modal("hide");
                this.edit = false;
                this.GetUsers()
            })
        },

        deleteGamme(id){
            axios.delete('/api/range/'+id)
            .then(response => {
                this.GetUsers()
            })
        },

        // Famille compossant
        getFamComps(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.famcomps = response.data
                this.loadingData = false
            })
        },


        // Fournisseurs
        getFournisseurs(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.fournisseurs = response.data
                this.loadingData = false
            })
        },

        //Modules
        getModules(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.modules = response.data
                this.loadingData = false
            })
        },

        //Article
        getAricles(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.aricles = response.data
                this.loadingData = false
            })
        }
    },

    mounted() {
        this.loadingData = true
        axios.get("https://jsonplaceholder.typicode.com/comments")
        .then(response => {
            this.comments = response.data
            this.loadingData = false
        })
    }
}
</script>

<style>

</style>