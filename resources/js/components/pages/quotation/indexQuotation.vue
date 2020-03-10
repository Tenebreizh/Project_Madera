<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Liste des devis</center></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <button @click="createQuotation()" class="btn btn-success">Ajouter</button>
                                    <!-- <router-link :to="{name:'quotation.create'}" class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </router-link> -->
                                </div>
                                <div class="col-lg-12">
                                    <DataTable :data="quotations" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
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
                {name: "project_id", th: "Référence du projet"},
                {name: "quotation_number", th: "Numéro du devis"},
                {name: "active", th: "Etat"},
            ],
            comments: [],
            quotations:[],
            quotation:{
                project_id:'',
                active:'',
            },
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"quotation.show", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"quotation.edit", params:{id:row.id}})
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le devis ?")){
                        this.deleteQuotation(row.id)
                    }
                }},
            ]
        }
    },

    methods:{
        getProjectQuotation(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get('/api/project/'+ id +'/quotations')
            .then(response => {
                this.quotations = response.data
                this.loadingData = false
                
            })
        },
        createQuotation(){
            if(confirm("Voulez-vous créer un nouveau devis ?")){
                this.quotation.project_id = this.$route.params.id
                this.quotation.active = "0"
                axios.post('/api/quotation', this.quotation)
                .then(response => {
                    this.quotations.push(response.data)
                    this.$noty.success("Création réusite")
                })
            }
        },
        deleteQuotation(id){
            axios.delete('/api/quotation/'+id)
            .then(response => {
                this.getProjectQuotation()
                this.$noty.success("Suppression réusite")
            })
        }
    },

    mounted() {
        this.getProjectQuotation()
    }
}
</script>

<style>

</style>