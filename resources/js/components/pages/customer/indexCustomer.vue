<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AddCustomer">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="clients" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal create -->
        <div class="modal fade bd-example-modal-lg" id="AddCustomer" tabindex="-1" role="dialog" aria-labelledby="AddCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Création d'un client</h5>
                        <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'un client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" v-model='client.firstname'>
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" v-model='client.lastname'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">N°:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" v-model='client.street_number'>
                                </div>
                                <div class="col form-group">
                                    <label for="street">Adresse:</label>
                                    <input type="text" class="form-control" id="street" name="street" v-model='client.street'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="cp">CP:</label>
                                    <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000" v-model='client.zipcode'>
                                </div>
                                <div class="col form-group">
                                    <label for="city">Ville:</label>
                                    <select class="form-control" v-model='client.city_id'>
                                        <option v-for="(city,key) in cities" value="city.id" :key="key"></option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="country">Pays:</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone:</label>
                                <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00" v-model='client.phone'>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr" v-model='client.email'>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!edit" type="button" class="btn btn-primary" @click="createClient()">Valider</button>
                        <button v-else type="button" class="btn btn-success" @click="updateClient()">Modifier</button>
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
            columnsCustomer: [
                {name: "firstname", th: "Firstname"},
                {name: "lastname",  th: "Lastname"},
                {name: "street",    th: "Street"},
            ],
            cities:[],
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
            clients: [],
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"customer.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit=true;
                    this.client = this.clients[index];
                    $("#AddCustomer").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le client ?")){
                        this.deleteClient(row.id)
                    }
                }},
            ]
        }
    },

    methods:{

        getClients(){
            axios.get("/api/cities")
            .then(response => {
                this.cities = response.data
                this.loadingData = false
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

        createClient(){
            axios.post('/api/client', this.client)
            .then(response => {
                this.clients.push(response.data)
                $("#AddCustomer").modal("hide");
            })
        },

        updateClient(){
            axios.put('/api/client/'+this.client.id,this.client)
            .then(response => {
                $("#AddCustomer").modal("hide");
                this.getClients()
            })
        },

        deleteClient(id){
            axios.delete('/api/client/'+id)
            .then(response => {
                this.getClients()
            })
        }
    },

    mounted() {
        this.getClients()
    }
}
</script>

<style>

</style>