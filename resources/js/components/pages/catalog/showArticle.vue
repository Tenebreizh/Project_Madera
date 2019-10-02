<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Article</h2>
                    <div class="col form-group">
                        <label for="reference">Référence:</label>
                        <input type="text" class="form-control" id="reference" name="reference">
                    </div>
                    <div class="col form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                    </div>
                    <div class="m-4">
                        <a href="#" data-toggle="modal" data-target="#AddSuppliers" class="button"><i class="fa fa-plus"></i>Ajouter un fournisseur</a>
                    </div>
                    <div class="col-lg-12">
                        <DataTable :data="comments" :columns="columnSuppliers" :actions="actionsFournisseur" :index="false" :loading="loadingData"></DataTable>
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
                                <label for="roles">Fournisseurs:</label>
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

    </div>
</template>

<script>
export default {
    data() {
        return {
            loadingData: false,
            comments: [],

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
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
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