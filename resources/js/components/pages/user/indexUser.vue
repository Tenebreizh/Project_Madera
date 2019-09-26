<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" id="nav-roles-tab" data-toggle="tab" href="#nav-roles" role="tab" aria-controls="nav-roles" aria-selected="true">Rôles</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">Utilisateurs</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddRole">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="comments" :columns="columnsRole" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddUser">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="comments" :columns="columnsUser" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Roles -->
        <div class="modal fade bd-example-modal-lg" id="AddRole" tabindex="-1" role="dialog" aria-labelledby="AddRoleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddRoleLabel">Création d'un client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class="col form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="col form-group">
                                <label for="designation">Désignation:</label>
                                <input type="text" class="form-control" id="designation" name="designation">
                            </div>
                            <div class="m-4">
                                <a href="#" data-toggle="modal" data-target="#AddDroit" class="button"><i class="fa fa-plus"></i>Ajouter un droit</a>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="droit"  :actions="actionsDroit" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valder</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal User -->
        <div class="modal fade bd-example-modal-lg" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="AddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddUserLabel">Création d'un client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Valder</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal droit -->
        <div class="modal fade" id="AddDroit" tabindex="-1" role="dialog" aria-labelledby="AddDroitLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddDroitLabel">Ajout d'un droit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="droit">droit:</label>
                        <select name="droit"></select>
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
            loadingData: false,
            columnsRole: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            columnsUser: [
                {name: "firstname", th: "Firstname"},
                {name: "lastname",  th: "Lastname"},
                {name: "street",    th: "Street"},
            ],
            droit: [
                {name: "reference", th: "Référence"},
                {name: "desciption",  th: "Description"},
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
            ],
            actionsDroit: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
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