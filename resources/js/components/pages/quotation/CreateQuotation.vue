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
                                <div id="container-entete-left" class="col-lg-7 mt-2 ml-2">
                                    <div class="row">
                                        <div class="col-lg-8 text-left mb-4">
                                        <h3>Informations générales</h3>

                                            <form>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Nom du projet" class="form-control" id="projectName" name="projectName">
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
                                                    <div class="col form-group">
                                                        <input type="text" placeholder="Date" class="form-control" id="date" name="date">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div id="container-entete-right" class="col-lg-4 mt-2 mr-2">  
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
                        <form action="/action_page.php">
                            <div class='row'>
                                <div class="col form-group">
                                    <input type="text" placeholder="Nom du projet" class="form-control" id="projectName" name="projectName">
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
                                <div class="col form-group">
                                    <input type="text" placeholder="Date" class="form-control" id="date" name="date">
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
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    alert("See: " + row.id);
                }},
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