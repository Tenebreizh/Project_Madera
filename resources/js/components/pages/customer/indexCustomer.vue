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
                                    <DataTable :data="comments" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="AddCustomer" tabindex="-1" role="dialog" aria-labelledby="AddCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddCustomerLabel">Création d'un client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">N°:</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                                <div class="col form-group">
                                    <label for="street">Adresse:</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="cp">CP:</label>
                                    <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000">
                                </div>
                                <div class="col form-group">
                                    <label for="city">Ville:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col form-group">
                                    <label for="country">Pays:</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone:</label>
                                <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr">
                            </div>

                        </form>
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
            columnsCustomer: [
                {name: "firstname", th: "Firstname"},
                {name: "lastname",  th: "Lastname"},
                {name: "street",    th: "Street"},
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