<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Création d'un devis</center></h2>
                                </div>
                            </div>

                            <div id="container-entete" class="row border">
                                <div id="container-entete-left" class="col-lg-8 pt-2 pl-2">
                                        <h3>Informations générales</h3>

                                            <form>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Nom du projet" class="form-control"  v-model="infoGeneral.projectName">
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Référence de gamme" class="custom-select" id="RefGammeSelect" name="RefGamme">            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Référence du projet" class="form-control" id="Refproject" name="Refproject">            
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Type de remplissage" class="custom-select" id="TypeOfFilling" name="TypeFilling">            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Référence du client" class="form-control" id="refClient" name="refClient">
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Finitions extérieures et intérieures" class="custom-select" id="externalFinitions" name="externalFinitions">            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-6 form-group">
                                                        <input type="text" placeholder="Date" class="form-control" id="date" name="date">
                                                    </div>
                                                </div>
                                            </form>
                                </div>
                            <div id="container-entete-right" class="col-lg-4 pt-2 pr-2">  
                                    <h3>Plan</h3>
                                        <form>
                                            <button class="btn btn-success" data-toggle="modal" data-target="#AddPlan">Ajouter un plan</button>
                                        </form> 

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
                            </div>

                            <div id="details" class="row border">
                                <div id="container-detail" class="col-lg-12 mt-2 ml-2">          
                                    <div class="col-lg-12">
                                        <h3>Détails</h3>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#AddCustomer">Ajouter</button>
                                        <button class="btn"></button>
                                        <DataTable :data="comments" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                    </div>
                                </div>
                            </div>

                            <div id="footer" class="row border">
                                <div id="footer-detail" class="col-lg-12 mt-2 ml-2">          
                                    <div class="col-lg-6 pull-left">
                                        <h3>Pied</h3>
                                        <form>
                                            <div class="form-group row">
                                                <label for="montantHT" class="col-sm-2 col-form-label">Montant H.T.</label>
                                                <div class="col-sm-10">
                                                <input type="" class="form-control" id="inputMontantHT" placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-block btn-success" @click="save()">Ajouter/enregistrer le devis</button>

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
                        <h5 class="modal-title" id="AddCustomerLabel"><center>Création d'un devis</center></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <select v-model="selectedModuleName" class="custom-select">
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
                        <button type="button" class="btn btn-primary">Valder</button>
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
            selectedModuleName: 0,
            infoGeneral: {
                projectName: '',
                refGamme: '',
                refProjet: '',
                type: '',
                refClient: '',
                finitionExterieur: '',
                date: ''
            },
            dataModules: {
                names: []
            },
            loadingData: false,
            columnsCustomer: [
                {name: "id", th: "N°"},
                {name: "name", th: "Nom du projet"},
                {name: "reference",  th: "Référence du projet"},
                {name: "referenceClient",    th: "Référence du client"},
                {name: "date",    th: "Date"},
            ],
            comments: [],
            actions: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
            ]
        }
    },

    mounted() {
        this.loadDataModules()
        this.loadingData = true
        axios.get("https://jsonplaceholder.typicode.com/comments")
        .then(response => {
            this.comments = response.data
            this.loadingData = false
        })
    },
    methods: {
        loadDataModules: async function() {
            let response = await axios.get("https://jsonplaceholder.typicode.com/users")
            this.dataModules.names = response.data
        },
        save: function() {
            console.log('Validation des data ex : ')
            let flagValidation = true
            if (!this.infoGeneral.projectName) {
                console.log('erreur validation')
                flagValidation = false
            }
            console.log('Save des data ex : ')
            if (flagValidation) {
                try {
                    let response = axios.post("vers le back URL", { projectName: this.infoGeneral.projectName})
                    if (response) {
                        this.$router.push({name: 'quotation'})
                    } else {
                        console.log('la save a echoue cote serveur')
                    }
                } catch(err) {
                        console.log('la req de save a echoue')
                }

            }
        }
    }
}
</script>

<style>

</style>