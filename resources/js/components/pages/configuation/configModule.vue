<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                        <li class="nav-item">
                            <router-link :to="{name: navs[0].name}" class="nav-item nav-link ">
                                Configuration gammes
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: navs[1].name}" class="nav-item nav-link active">
                                Configuration modules
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row tab-content">
                        <div class="col-sm-12 tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Modules</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#addModule">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="modules" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal module -->
        <div class="modal fade bd-example-modal-lg" id="addModule" tabindex="-1" role="dialog" aria-labelledby="addModuleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModuleLabel">Ajout d'un module</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div id="Entete-module">
                                <h2 class="text-center ml-5 mb-5 mr-5">Composant</h2>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="reference">Référence</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class="col form-group">
                                        <label for="reference">Coupe de principe</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class="col form-group">
                                        <label for="reference">Coupe CCTP</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col card m-2">
                                    <h4>Détail des sections</h4>
                                    <div class=" form-group">
                                        <label for="reference">Nombre de lisses</label>
                                        <input type="number" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Nombre de contreforts</label>
                                        <input type="number" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Sabots d'assemblage</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Goujons de fixation</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Support de sol</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                </div>
                                <div class="col card m-2">
                                    <h4>Détail des montants</h4>
                                    <div class=" form-group">
                                        <label for="reference">Départ</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Arrivée</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Intermédiaire</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col card m-2">
                                    <h4>Remplisage par unité entre deux montant</h4>
                                    <div class="form-group">
                                        <label for="reference">Remplissage</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class="form-group">
                                        <label for="reference">Visserie</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class="form-group">
                                        <label for="reference">Panneaux</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                </div>
                                <div class="col card m-2">
                                    <div class=" form-group">
                                        <label class="mt-4" for="reference">Pourcentage de marge sur le prix de base</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Temps de main d'oeuvre atelier</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label for="reference">Temps de main d'oeuvre pose</label>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Modification</button>
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
            loadingData: false,
            modules: [
                {name: "reference",     th: "Référence"},
                {name: "coupPrincipe",  th: "Coupe de pricipe"},
                {name: "cctp",   th: "Coupe CCTP"},
            ],
            comments: [],
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    this.$router.push({name:"configurationDetail", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
            ],
            navs: [
                { name: 'configuration', path: '/config'},

                { name: 'configModule', path: '/configModule'},
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