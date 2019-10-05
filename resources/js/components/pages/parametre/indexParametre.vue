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
                                    <DataTable :data="comments" :columns="Composant" :actions="actions" :index="false" :loading="loadingData"></DataTable>
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

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal compasant -->
        <div class="modal fade bd-example-modal-lg" id="AddComposant" tabindex="-1" role="dialog" aria-labelledby="AddComposantLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddComposantLabel">Ajout d'une gamme</h5>
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
            comments: [],
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