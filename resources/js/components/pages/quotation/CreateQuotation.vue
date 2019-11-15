<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card ">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Création d'un devis</center></h2>
                                </div>
                            </div>
                                <div id="container-haut" class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 pt-2 pl-2">
                                            <h3 class="text-center">Informations générales</h3>
                                                <div id="container-entete-left" class="">
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Nom du projet:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Gamme:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(range, key) in ranges" :value="range.id" :key="key"> {{ range.reference }} </option>
                                                        </select>             
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Référence du projet:</label>
                                                        <input type="text" class="form-control">            
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Type d'isolation:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(insulator, key) in insulators" :value="insulator.id" :key="key"> {{ insulator.reference }} </option>
                                                        </select>            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Référence du client:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Finitions extérieur:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(external_finition, key) in external_finitions" :value="external_finition.id" :key="key"> {{ external_finition.reference }} </option>
                                                        </select>            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-6 form-group">
                                                        <label for="roles">Date de création:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 pt-2 pl-2">
                                            <h3 class="text-center">Plan</h3>
                                            <div id="container-entete-right" class=" text-center"> 
                                                <button class="btn btn-success" data-toggle="modal" data-target="#AddPlan">Ajouter un plan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                

                                <div class="modal fade" id="AddPlan" tabindex="-1" role="dialog" aria-labelledby="AddPlanLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p>Plan du Bureau d'études</p>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class='row'>
                                                            <div class="col form-group">
                                                                <input type="text" placeholder="Fichier" class="form-control" id="fileName" name="fileName">
                                                            </div>
                                                            <div class="col form-group">
                                                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">            
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Envoyer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <hr>
                            <div id="details" class="row">
                                
                                <div id="container-detail" class="col-lg-12 mt-2 ml-2">
                                    <div class="row">
                                        <h3 class="col-lg-1 float-left">Détails</h3>
                                        <button class="offset-10 btn btn-primary" data-toggle="modal" data-target="#AddCustomer">Ajouter</button>
                                    </div>
                                    <br>        
                                    <div class="col-lg-12">
                                        <DataTable :data="comments" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                    </div>
                                </div>
                            </div>

                            <div id="footer" class="row">
                                <div id="footer-detail" class="col-lg-12 mt-2 ml-2">
                                    <hr>                                     
                                    <h3>Pied</h3>         
                                    <div class="col-lg-6 pull-left">
                                        <form>
                                            <div class="form-group row">
                                                <label for="montantHt" class="col-sm-2 col-form-label">Montant H.T.</label>
                                                <div class="col-sm-10">
                                                    <input type="" class="form-control" id="inputMontantHT" placeholder="">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label for="TVA" class="col-sm-2 col-form-label">T.V.A.</label>
                                                        <div class="col-sm-10">
                                                    <input type="" class="form-control" id="inputMontantHT" placeholder="">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label for="montantTtc" class="col-sm-2 col-form-label">Montant T.T.C.</label>
                                                        <div class="col-sm-10">
                                                    <input type="" class="form-control" id="inputMontantHT" placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="save()">Valider</button>
                        </div>

                        </div>  
                    </div>
                </div>
            </div>
        

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="AddCustomer" tabindex="-1" role="dialog" aria-labelledby="AddCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddCustomerLabel"><center>Choix des modules</center></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <select class="custom-select">
                                        <!--<option selected disabled value="0">Nom</option>-->
                                        <!--<option :value="nameModule.id" v-for="nameModule in dataModules.names">
                                            {{nameModule.username}}
                                        </option>-->
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <input type="text" placeholder="Prix" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <select class="custom-select">
                                        <option selected disabled value="0">Taxe</option>
                                    </select>
                                </div>
                            </div>
                            <div class='row'>
                                    <div class="col form-group">
                                    <input type="text" placeholder="Description" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <input type="text" placeholder="Quantité" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <select class="custom-select">
                                        <option selected disabled value="0">Module</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Coupe de principe</th>
                                    <th>Coupe CCTP</th>
                                </tr>
                                </thead>
                            </table>

                            <div class='row'>
                                <div class="col-4 form-group">
                                    <input type="text" placeholder="Ref" class="form-control">
                                </div>
                                <div class="col-7 offset-1">
                                <div class="row form-group">
                                    <label for="lenghtSection" class="col col-form-label ">Longueur de la section</label>
                                    <div class="col">
                                        <input type="text" placeholder="Longueur de la section" id="lenghtSection" class="form-control">
                                    </div>
                                </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class="col-4 form-group">
                                    <input type="text" placeholder="Description du module" class="form-control">
                                </div>
                                <div class="col-7 offset-1">
                                <div class="row form-group">
                                    <label for="angle" class="col col-form-label ">Angle</label>
                                    <div class="col">
                                        <input type="text" placeholder="Angle" id="angle" class="form-control">
                                    </div>
                                </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class="col-4 form-group">
                                    <input type="text" placeholder="Marge commercial" class="form-control">
                                </div>
                            </div>

                            <div class='row'>
                                <div class="col form-group">
                                    <label for="Specification">Spécifications</label>
                                    <textarea class="form-control" id="Specification" rows="3"></textarea>
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
    </div>
</template>

<script>
import moment from "moment";

export default {
    data() {
        return {
            loadingData: false,
            columnsCustomer: [
                {name: "id", th: "N°"},
                {name: "name", th: "Nom du projet"},
                {name: "reference",  th: "Référence du projet"},
                {name: "referenceClient",    th: "Référence du client"},
                {name: "date",    th: "Date"},
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
            actions: [
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ]
        }
    },

    methods: {
        getinsulators(){
            axios.get("/api/insulators")
            .then(response => {
                this.insulators = response.data
            })
        },
        getFinitions(){
            axios.get("/api/externalFinitions")
            .then(response => {
                this.external_finitions = response.data
            })
        },
        getGammes(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.ranges = response.data
                this.loadingData = false
            })
        },


        getAllValue(){
            this.getinsulators(),
            this.getFinitions(),
            this.getGammes()
        }
    },

    mounted() {
       this.getAllValue()
    },
}
</script>

<style>

</style>