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
                                    <DataTable :data="roles" :columns="columnsRole" :actions="actionsRôles" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button class="btn btn-success" @click="showModalUser()">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="users" :columns="columnsUser" :actions="actions" :index="false" :loading="loadingData"></DataTable>
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
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un rôle</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un rôle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="col form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="role.name">
                            </div>
                            <div class="col form-group">
                                <label for="designation">Désignation:</label>
                                <input type="text" class="form-control" id="designation" name="designation" v-model="role.description">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createRole()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateRole()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal User -->
        <div class="modal fade bd-example-modal-lg" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="AddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un utilisateur</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" v-model="user.firstname">
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" v-model="user.lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr" v-model="user.email">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for='pwd'>Mot de passe</label>
                                    <input type="password" class="form-control" id="epwdmail" name="pwd" v-model="user.password">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="roles">Rôles:</label>
                                    <select name="role" class="form-control" v-model="user.user_type_id">
                                        <option v-for="(role, key) in roles" :value="role.id" :key="key"> {{ role.name }} </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createUser()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateUser()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal droit -->
        <div class="modal fade bd-example-modal-lg" id="AddDroit" tabindex="-1" role="dialog" aria-labelledby="AddDroitLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddDroitLabel">Ajout d'un droit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="form-group">
                                <label for="roles">Rôles:</label>
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

        <!-- Modal logs Delete -->
        <div class="modal fade bd-example-modal-lg" id="Addlog" tabindex="-1" role="dialog" aria-labelledby="AddlogLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddlogLabel">Supprimer les logs de l'utilisateur ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-lg btn-block" @click="DeleteUserLog()">OUI</button>
                                <button type="button" class="btn btn-danger btn-lg btn-block" @click="NoDeleteUserLog()">NON</button>
                            </div>
                        </form>
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
            edit: false,
            dellog:'',
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
            users: [],
            user:{
                email:'',
                firstname:'',
                lastname:'',
                password:'',
                user_type_id:''
            },
            connect_user:{},
            roles: [],
            role:{
                name:'',
                description:''
            },
            actionsRôles: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"role.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit = true;
                    this.role = this.roles[index];
                    $("#AddRole").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le role ?")){
                        this.deleteRole(row.id)
                    }
                }},
            ],
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"user.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit = true;
                    this.user = this.users[index];
                    $("#AddUser").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    this.dellog = row.id
                    $("#Addlog").modal("show");
                }},
            ],
            actionsDroit: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ]
        }
    },


    methods:{
        
        GetUsers(){
            this.loadingData = true
            axios.get("/api/users")
            .then(response => {
                this.users = response.data
                this.loadingData = false
            })
        },

        createUser(){
            this.user.push({'user_id': this.connect_user.id})
            axios.post('/api/user', this.user)
            .then(response => {
                this.users.push(response.data)
                $("#AddUser").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateUser(){
            this.user.push({'user_id': this.connect_user.id})
            axios.put('/api/user/'+this.user.id,this.user)
            .then(response => {
                $("#AddUser").modal("hide");
                this.edit = false;
                this.GetUsers()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteUser(id){
            axios.delete('/api/user/'+id, {'user_id': this.connect_user.id})
            .then(response => {
                this.GetUsers()
                this.$noty.success("Suppression réusite")
            })
        },

        GetRoles(){
            this.loadingData = true
            axios.get("/api/userTypes")
            .then(response => {
                this.roles = response.data
                this.loadingData = false
            })
        },

        createRole(){
            this.role.push({'user_id': this.connect_user.id})
            axios.post('/api/userType', this.role)
            .then(response => {
                this.roles.push(response.data)
                $("#AddRole").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateRole(){
            this.role.push({'user_id': this.connect_user.id})
            axios.put('/api/userType/'+this.role.id,this.role)
            .then(response => {
                $("#AddRole").modal("hide");
                this.edit = false;
                this.GetRoles()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteRole(id){
            axios.delete('/api/userType/'+id, {'user_id': this.connect_user.id})
            .then(response => {
                this.GetRoles()
                this.$noty.success("Suppression réusite")
            })
        },

        showModalUser(){
            this.edit = false;
            $("#AddUser").modal("show");
        },

        DeleteUserLog(){
            $("#Addlog").modal("hide");
            this.deleteUser(this.dellog)
        },

        NoDeleteUserLog(){
            $("#Addlog").modal("hide");
        },

        getUser() {
            if (window.localStorage.token) {
                this.isUser = true
                axios.get('/api/user')
                .then(response => {
                    this.connect_user = response.data
                })
            }
        },

    },

    mounted() {
        this.getUser(),
        this.GetUsers(),
        this.GetRoles()
    }
}
</script>

<style>

</style>