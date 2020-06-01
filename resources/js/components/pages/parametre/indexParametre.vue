<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" id="nav-composant-tab" data-toggle="tab" href="#nav-composant" role="tab" aria-controls="nav-composant" aria-selected="true">Composants</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-tva-tab" data-toggle="tab" href="#nav-tva" role="tab" aria-controls="nav-tva" aria-selected="false">TVA</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-etat-tab" data-toggle="tab" href="#nav-etat" role="tab" aria-controls="nav-etat" aria-selected="false">Etat de pièce</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-droit-tab" data-toggle="tab" href="#nav-droit" role="tab" aria-controls="nav-droit" aria-selected="false">Droit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-logs-tab" data-toggle="tab" href="#nav-logs" role="tab" aria-controls="nav-logs" aria-selected="false">Logs</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row tab-content">

                        <!-- tableau composant -->
                        <div class="col-sm-12 tab-pane fade show active" id="nav-composant" role="tabpanel" aria-labelledby="nav-composant-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddComposant">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="components" :columns="Composant" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>

                        <!-- tableau tva -->
                        <div class="col-sm-12 tab-pane" id="nav-tva" role="tabpanel" aria-labelledby="nav-tva-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddTVA">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="TVA" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>

                        <!-- tableau etat -->
                        <div class="col-sm-12 tab-pane" id="nav-etat" role="tabpanel" aria-labelledby="nav-etat-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddEtat">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="Etat" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>

                        <!-- tableau droit -->
                        <div class="col-sm-12 tab-pane" id="nav-droit" role="tabpanel" aria-labelledby="nav-droit-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddModule">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="Droit" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>

                        <!-- Tableau Logs -->
                        <div class="col-sm-12 tab-pane" id="nav-logs" role="tabpanel" aria-labelledby="nav-logs-tab">
                            <div class="row">
                                <div class="col">
                                    <DataTable :data="logs" :columns="Logs" :actions="actions_Logs" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal compasant -->
        <div class="modal fade bd-example-modal-lg" id="AddComposant" tabindex="-1" role="dialog" aria-labelledby="AddComposantLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddComposantLabel">Ajout d'un composant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference" name="reference" v-model="new_component.name">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" v-model="new_component.description"></textarea>
                            </div>

                            <div class="col form-group">
                                <label for="city">Type:</label>
                                <select class="form-control" v-model='new_component.component_type_id'>
                                    <option v-for="(type,key) in component_types" :value="type.id" :key="key"> {{ type.name }} </option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="createComponent()">Valider</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal TVA -->
        <div class="modal fade bd-example-modal-lg" id="AddTVA" tabindex="-1" role="dialog" aria-labelledby="AddTVALabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddTVALabel">Ajout d'une famille de composant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference_tva" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description_tva"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Etat de pièce -->
        <div class="modal fade bd-example-modal-lg" id="AddEtat" tabindex="-1" role="dialog" aria-labelledby="AddEtatLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddEtatLabel">Ajout d'un fournisseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference_etat" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description_etat"></textarea>
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
                                <input type="text" class="form-control" id="reference_module" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description_module"></textarea>
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
</template>

<script>
import moment from "moment";

export default {
    data() {
        return {
            loadingData: false,
            Composant: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            TVA: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            Etat: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            Droit: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            Logs: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
                {name: "table", th: "Table"}
            ],
            comments: [],
            logs:[],
            components: [],
            component_types: [],
            new_component: {},
            log:{
                user_id:'',
                description:'',
                action_id:'',
                name:'',
                table:''
            },

            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    alert("See: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ],
            actions_Logs: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"Log.show", params:{id:row.id}})
                }},
            ],
        }
    },

    methods:{
        getLogs(){
            this.loadingData = true
            axios.get("/api/logs")
            .then(response => {
                this.logs = response.data
                this.loadingData = false
            })
        },

        getComponentTypes(){
            this.loadingData = true
            axios.get("/api/component_types")
            .then(response => {
                this.component_types = response.data
                this.loadingData = false
            })
        },

        getComponents() {
            this.loadingData = true
            axios.get("/api/components")
            .then(response => {
                this.components = response.data
                this.loadingData = false
            })
        },

        createComponent() {
            this.loadingData = true

            axios.post("/api/component", this.new_component)
            .then(response => {
                this.components.push(response.data)
                $("#AddComposant").modal("hide");
                this.$noty.success("Création réussite")
                this.new_component = {}
                this.loadingData = false
            })
        }
    },
    
    mounted() {
        this.getLogs()
        this.getComponents()
        this.getComponentTypes()

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