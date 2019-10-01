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
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Finition extérieur</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddExternal_finition">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="external_finitions" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type d'isolant</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddIsolation">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="isolators" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type de couverture</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddCoverings">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="coverings" :actions="actionsCovering" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Huisserie</h3>
                                    <button class="btn btn-success"  data-toggle="modal" data-target="#AddWindowFrame">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="windows_frames" :actions="actions" :index="false" :loading="loadingData"></DataTable>
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
                        <h5 class="modal-title" id="AddExternal_finitionLabel">Ajout d'une finition extérieur</h5>
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

        <!-- Modal type d'isolant -->
        <div class="modal fade bd-example-modal-lg" id="AddIsolation" tabindex="-1" role="dialog" aria-labelledby="AddIsolationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddIsolationLabel">Ajout d'un type d'isolant</h5>
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

        <!-- Modal type de couverture -->
        <div class="modal fade bd-example-modal-lg" id="AddCoverings" tabindex="-1" role="dialog" aria-labelledby="AddCoveringsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddCoveringsLabel">Ajout d'un type de couverture</h5>
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


        <!-- Modal huisserie -->
        <div class="modal fade  bd-example-modal-lg" id="AddWindowFrame" tabindex="-1" role="dialog" aria-labelledby="AddWindowFrameLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddWindowFrameLabel">Ajout d'une huisserie</h5>
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
            external_finitions: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            isolators: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            coverings: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            windows_frames: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            comments: [],
            actionsFinitions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    //alert("See: " + row.id);
                    this.$router.push({ name: "configurationDetail", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
            ],

            navs: [
                { name: 'configModule', path: '/configModule'},
            ],
            
            actionsIsolators: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    //alert("See: " + row.id);
                    this.$router.push({ name: "configurationDetail", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
            ],
            actionsCovering: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    //alert("See: " + row.id);
                    this.$router.push({ name: "configurationDetail", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    alert("Edit :" + row.id);
                }},
            ],
            actionsFrames: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    //alert("See: " + row.id);
                    this.$router.push({ name: "configurationDetail", params: {'id': row.id} })
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
                    alert("Edit :" + row.id);
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