<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Article</h2>
                    <div class="col form-group">
                        <label for="reference">Référence:</label>
                        <input type="text" class="form-control" id="reference" name="reference" v-model="article.name">
                    </div>
                    <div class="col form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description" v-model="article.description"></textarea>
                    </div>
                    <div class="m-4">
                        <a href="#" data-toggle="modal" data-target="#AddSuppliers" class="button"><i class="fa fa-plus"></i>Ajouter un fournisseur</a>
                    </div>
                    <div class="col-lg-12">
                        <DataTable :data="fournisseurs" :columns="columnSuppliers" :actions="actionsFournisseur" :index="false" :loading="loadingData"></DataTable>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal fournisseurs -->
        <div class="modal fade bd-example-modal-lg" id="AddSuppliers" tabindex="-1" role="dialog" aria-labelledby="AddSuppliersLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddSuppliersLabel">Ajout d'un fournisseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <form>
                            <div class="form-group">
                                <label for="suppliers">Fournisseurs:</label>
                                <select name="suppliers" class="form-control" v-model="Add_Supplier_Id">
                                    <option v-for="(supplier, key) in suppliers" :value="supplier.id" :key="key"> {{ supplier.firstname }} </option>
                                </select> 
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="addSuppliersArticle()">Valider</button>
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
            loadingData: false,
            
            article:{
                name:'',
                description:'',
            },
            fournisseurs:[],
            fournisseur:{
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                city:'',
                country:'',
                phone:'',
                fax:'',
                email:'',
            },

            suppliers:[],
            supplier:{
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                city:'',
                country:'',
                phone:'',
                fax:'',
                email:'',
            },
            Add_Supplier_Id:null,

            columnSuppliers: [
                {name: "firstname", th: "Nom"},
                {name: "lastname", th: "Prénom"},
                {name: "street", th: "Adresse"},
                {name: "email", th: "Email"},
                {name: "phone", th: "Téléphone"},
                {name: "fax", th: "Fax"},
            ],
            actionsFournisseur: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.$router.push({name:"fournisseur.show", params:{id:row.id}})
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

    methods:{
        
        getSuppliers(){
            axios.get("/api/suppliers")
            .then(response => {
                this.suppliers = response.data
            })
        },

        getArticle(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get("/api/component/"+id)
            .then(response => {
                this.article = response.data
                this.fournisseurs = response.data.suppliers
                this.loadingData = false
            })
        },

        addSuppliersArticle() {
            this.loadingData = true
            axios.post("/api/component/" + this.article.id + "/supplier", {supplier_id: this.Add_Supplier_Id})
            .then(response => {
                this.fournisseurs = response.data 
                this.loadingData = false
            })
        },

    },

    mounted() {
        this.getArticle()
        this.getSuppliers()
    }

}
</script>

<style>

</style>