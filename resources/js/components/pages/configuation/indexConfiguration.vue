<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" id="nav-roles-tab" data-toggle="tab" href="#nav-gammes" role="tab" aria-controls="nav-roles" aria-selected="true">Configuration gammes</a>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: navs[0].name}" class="nav-item nav-link ">
                                Configuration modules
                            </router-link>
                            <!--<a class="nav-item nav-link " id="nav-user-tab" data-toggle="tab" href="#" role="tab" aria-controls="nav-user" aria-selected="false">Configuration modules</a>-->
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row tab-content">
                        <div class="col-lg-6  tab-pane fade show active" id="nav-External_finition" role="tabpanel" aria-labelledby="nav-External_finition-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Finition extérieur</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddExternal_finition">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="external_finitions" :columns="colexternal_finitions" :actions="actionsFinitions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  tab-pane fade show active" id="nav-Isolation" role="tabpanel" aria-labelledby="nav-Isolation-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type d'isolant</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddIsolation">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="insulators" :columns="isolators" :actions="actionsIsolators" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  tab-pane fade show active" id="nav-Coverings" role="tabpanel" aria-labelledby="nav-Coverings-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type de couverture</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddCoverings">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="coverings" :columns="colcoverings" :actions="actionsCovering" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  tab-pane fade show active" id="nav-WindowFrame" role="tabpanel" aria-labelledby="nav-WindowFrame-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Huisserie</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddWindowFrame">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="windowFrames" :columns="windows_frames" :actions="actionsFrames" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Finition extérieur -->
        <div class="modal fade bd-example-modal-lg" id="AddExternal_finition" tabindex="-1" role="dialog" aria-labelledby="AddExternal_finitionLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'une finition extérieur</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'une finition extérieur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference1" name="reference" v-model="external_finition.reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description1" v-model="external_finition.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createFinition()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateFinition()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal type d'isolant -->
        <div class="modal fade bd-example-modal-lg" id="AddIsolation" tabindex="-1" role="dialog" aria-labelledby="AddIsolationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un type d'isolant</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un type d'isolant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference2" name="reference" v-model="insulator.reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description2" v-model="insulator.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createinsulator()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateinsulator()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal type de couverture -->
        <div class="modal fade bd-example-modal-lg" id="AddCoverings" tabindex="-1" role="dialog" aria-labelledby="AddCoveringsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un type de couverture</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un type de couverture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference3" name="reference" v-model="covering.reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description3" v-model="covering.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createCovering()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateCovering()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal huisserie -->
        <div class="modal fade  bd-example-modal-lg" id="AddWindowFrame" tabindex="-1" role="dialog" aria-labelledby="AddWindowFrameLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'une huisserie</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'une huisserie</h5>
                        <h5 class="modal-title" id="AddWindowFrameLabel">Ajout d'une huisserie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference" name="reference" v-model="windowFrame.reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" v-model="windowFrame.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createwindowFrame()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updatewindowFrame()">Modifier</button>
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
            colexternal_finitions: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            isolators: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            colcoverings: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            windows_frames: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            comments: [],

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

            actionsFinitions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    this.$router.push({ name: "ExternalFinition.show", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    this.edit=true;
                    this.external_finition = this.external_finitions[index];
                    $("#AddExternal_finition").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    if(confirm("Voulez vous suprimer la finition extérieur?")){
                        this.deleteFinition(row.id)
                    }
                }},
            ],

            actionsIsolators: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    this.$router.push({ name: "isolator.show", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    this.edit=true;
                    this.insulator = this.insulators[index];
                    $("#AddIsolation").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le type d'isolant ?")){
                        this.deleteinsulator(row.id)
                    }
                }},
            ],
            actionsCovering: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    this.$router.push({ name: "covering.show", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    this.edit=true;
                    this.covering = this.coverings[index];
                    $("#AddCoverings").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le type de couverture ?")){
                        this.deleteCovering(row.id)
                    }
                }},
            ],
            actionsFrames: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    this.$router.push({ name: "WindowsFrame.show", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    this.edit=true;
                    this.windowFrame = this.windowFrames[index];
                    $("#AddWindowFrame").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    if(confirm("Voulez vous suprimer l'huisserie ?")){
                        this.deletewindowFrame(row.id)
                    }
                }},
            ],

            navs: [
                { name: 'configModule', path: '/configModule'},
            ],
        }
    },

    methods:{
        // finition extérieur
        getFinitions(){
            this.loadingData = true
            axios.get("/api/externalFinitions")
            .then(response => {
                this.external_finitions = response.data
                this.loadingData = false
            })
        },

        createFinition(){
            this.external_finition.label =  this.external_finition.reference.toLowerCase()
            axios.post('/api/externalFinition', this.external_finition)
            .then(response => {
                this.external_finitions.push(response.data)
                $("#AddExternal_finition").modal("hide");
            })
        },

        updateFinition(){
            axios.put('/api/externalFinition/'+this.external_finition.id,this.external_finition)
            .then(response => {
                $("#AddExternal_finition").modal("hide");
                this.edit = false;
                this.getFinitions()
            })
        },

        deleteFinition(id){
            axios.delete('/api/externalFinition/'+id)
            .then(response => {
                this.getFinitions()
            })
        },


        // type d'isolant
        getinsulators(){
            this.loadingData = true
            axios.get("/api/insulators")
            .then(response => {
                this.insulators = response.data
                this.loadingData = false
            })
        },

        createinsulator(){
            this.insulator.label =  this.insulator.reference.toLowerCase()
            axios.post('/api/insulator', this.insulator)
            .then(response => {
                this.insulators.push(response.data)
                $("#AddIsolation").modal("hide");
            })
        },

        updateinsulator(){
            axios.put('/api/insulator/'+this.insulator.id,this.insulator)
            .then(response => {
                $("#AddIsolation").modal("hide");
                this.edit = false;
                this.getinsulators()
            })
        },

        deleteinsulator(id){
            axios.delete('/api/insulator/'+id)
            .then(response => {
                this.getinsulators()
            })
        },

        // Couverture
        getCoverings(){
            this.loadingData = true
            axios.get("/api/coverings")
            .then(response => {
                this.coverings = response.data
                this.loadingData = false
            })
        },

        createCovering(){
            this.covering.label =  this.covering.reference.toLowerCase()
            axios.post('/api/covering', this.covering)
            .then(response => {
                this.coverings.push(response.data)
                $("#AddCoverings").modal("hide");
            })
        },

        updateCovering(){
            axios.put('/api/covering/'+this.covering.id,this.covering)
            .then(response => {
                $("#AddCoverings").modal("hide");
                this.edit = false;
                this.getCoverings()
            })
        },

        deleteCovering(id){
            axios.delete('/api/covering/'+id)
            .then(response => {
                this.getCoverings()
            })
        },

        // Huisserie
        getwindowFrames(){
            this.loadingData = true
            axios.get("/api/windowFrames")
            .then(response => {
                this.windowFrames = response.data
                this.loadingData = false
            })
        },

        createwindowFrame(){
            this.windowFrame.label =  this.windowFrame.reference.toLowerCase()
            axios.post('/api/windowFrame', this.windowFrame)
            .then(response => {
                this.windowFrames.push(response.data)
                $("#AddWindowFrame").modal("hide");
            })
        },

        updatewindowFrame(){
            axios.put('/api/windowFrame/'+this.windowFrame.id,this.windowFrame)
            .then(response => {
                $("#AddWindowFrame").modal("hide");
                this.edit = false;
                this.getwindowFrames()
            })
        },

        deletewindowFrame(id){
            axios.delete('/api/windowFrame/'+id)
            .then(response => {
                this.getwindowFrames()
            })
        },

        //get all
        getAllValue(){
            this.getFinitions(),
            this.getinsulators(),
            this.getCoverings(),
            this.getwindowFrames()
        }

    },


    mounted() {
        this.getAllValue()
    },
}
</script>

<style>

</style>