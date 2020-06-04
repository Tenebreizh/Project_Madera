<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Liste des Projets</center></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddProject">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="projects" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="AddProject" tabindex="-1" role="dialog" aria-labelledby="AddProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un projet</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un projet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Client:</label>
                                    <select name="role" class="form-control" v-model="project.client_id">
                                        <option v-for="(client, key) in clients" :value="client.id" :key="key"> {{ client.firstname + ' ' + client.lastname }} </option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Utilisateur:</label>
                                    <select name="role" class="form-control" v-model="project.user_id">
                                        <option v-for="(user, key) in users" :value="user.id" :key="key"> {{ user.firstname + ' ' + user.lastname }} </option>
                                    </select>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">Etat:</label>
                                    <input type="text" class="form-control" id="numero1" name="numero" v-model='project.state_id'>
                                </div>
                                <div class="col form-group">
                                    <label for="street">Nom du projet:</label>
                                    <input type="text" class="form-control" id="street1" name="street" v-model='project.name'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">Description:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" v-model='project.description'>
                                </div>
                                <div class="col form-group">
                                    <label for="street">Référence:</label>
                                    <input type="text" class="form-control" id="street" name="street" v-model='project.reference'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createProject()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateProject()">Modifier</button>
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
            columnsCustomer: [
                {name: "id", th: "N°"},
                {name: "name", th: "Nom du projet"},
                {name: "reference",  th: "Référence du projet"},
                {name: "referenceClient",    th: "Référence du client"},
                {name: "date",    th: "Date"},
            ],
            comments: [],
            projects:[],
            project:{
                client_id:'',
                user_id:'',
                state_id:'',
                name:'',
                description:'',
                reference:'',
            },
            clients:[],
            client:{
                city_id:'',
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                email:'',
                phone:''
            },
            users: [],
            user:{
                email:'',
                firstname:'',
                lastname:'',
                password:'',
                user_type_id:''
            },
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"quotationlist", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit = true;
                    this.project = this.projects[index];
                    $("#AddProject").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le projet ?")){
                        this.deleteProject(row.id)
                    }
                }},
            ]
        }
    },

    methods:{
        getProjects(){
            this.loadingData = true
            axios.get("/api/projects")
            .then(response => {
                this.projects = response.data
                this.loadingData = false
            })
        },

        createProject(){
            Object.assign(this.project, {'user_id': this.connect_user.id})
            axios.post('/api/project', this.project)
            .then(response => {
                this.projects.push(response.data)
                $("#AddProject").modal("hide");
                this.$noty.success("Création réusite")
            })
        },

        updateProject(){
            Object.assign(this.project, {'user_id': this.connect_user.id})
            axios.put('/api/project/'+this.project.id,this.project)
            .then(response => {
                $("#AddProject").modal("hide");
                this.edit = false;
                this.getProjects()
                this.$noty.success("Mise à jour réusite")
            })
        },

        deleteProject(id){
            axios.delete('/api/project/'+id, {params: {'user_id': this.connect_user.id}})
            .then(response => {
                this.getProjects()
                this.$noty.success("Suppression réusite")
            })
        },

        getClients(){
            this.loadingData = true
            axios.get("/api/clients")
            .then(response => {
                this.clients = response.data
                this.loadingData = false
            })
        },
        GetUsers(){
            this.loadingData = true
            axios.get("/api/users")
            .then(response => {
                this.users = response.data
                this.loadingData = false
            })
        },

        getUser() {
            axios.get('/api/user')
            .then(response => {
                this.connect_user = response.data
            })
        },
    },

    mounted() {
        this.getUser(),
        this.getProjects(),
        this.getClients(),
        this.GetUsers()
    }
}
</script>

<style>

</style>