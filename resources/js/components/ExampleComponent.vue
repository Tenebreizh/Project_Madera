<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-header">Bienvenue sur l'intranet Madera</div>
                </div>
            </div>

            <div class="col-md-10 mt-4">
                <div class="card text-center">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Vos devis</center></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <DataTable :data="quotations" :columns="columns" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
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
    export default {
        data() {
            return {
                columns: [
                    {name: "id", th: "N°"},
                    {name: "project_id", th: "Référence du projet"},
                    {name: "quotation_number", th: "Numéro du devis"},
                    {name: "active", th: "Etat"},
                ],
                actions: [
                    {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                        this.$router.push({name:"quotation.show", params:{id:row.id}})
                    }},
                ],
                quotations: [],
                loadingData: false,
            }
        },

        methods: {
            getUserConnected() {
                axios.get('/api/user/')
                .then(response => {
                    this.getQuotations(response.data.id)
                })
            },

            getQuotations(id) {
                this.loadingData = true
                axios.get("/api/client/" + id + "/quotations")
                .then(response => {
                    this.quotations = response.data
                    this.loadingData = false
                })
            },
        },

        mounted() {
            this.getUserConnected()
            // this.getQuotations()
        }
    }
</script>
