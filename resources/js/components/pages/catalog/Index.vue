<template>
  <div class="row py-4">
      <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                    <li class="nav-item">
                        <a class="nav-item nav-link active" id="nav-gammes-tab" data-toggle="tab" href="#nav-gammes" role="tab" aria-controls="nav-gammes" aria-selected="true">Gammes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-composants-tab" data-toggle="tab" href="#nav-composants" role="tab" aria-controls="nav-composants" aria-selected="false">Famille Composants</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-fournisseurs-tab" data-toggle="tab" href="#nav-fournisseurs" role="tab" aria-controls="nav-fournisseurs" aria-selected="false">Fournisseurs</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-modules-tab" data-toggle="tab" href="#nav-modules" role="tab" aria-controls="nav-modules" aria-selected="false">Modules</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="columnsRange" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                        
                        <!-- <div class="row mt-4 justify-content-center">
                            <div class="col-lg-6">
                                <form action="#">
                                    <legend>Ajouter une gamme</legend>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control" id="lorem" placeholder="Finition Extérieure">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control" id="lorem" placeholder="Type Isolant">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control" id="lorem" placeholder="Type de couverture">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control" id="lorem" placeholder="Qualité huisserie">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <select class="form-control" name="" id="lorem">
                                                <option selected disabled> Règles </option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>

                    <div class="tab-pane fade" id="nav-composants" role="tabpanel" aria-labelledby="nav-composants-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="columnsComponents" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                        
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-6">
                                <form action="#">
                                    <legend>Ajouter une famille de composants</legend>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Finition Extérieure">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type Isolant">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type de couverture">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Qualité huisserie">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <select class="form-control" name="" id="lorem">
                                                <option selected disabled> Règles </option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-fournisseurs" role="tabpanel" aria-labelledby="nav-fournisseurs-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="columnSuppliers" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                        
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-6">
                                <form action="#">
                                    <legend>Ajouter un fournisseur</legend>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Finition Extérieure">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type Isolant">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type de couverture">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Qualité huisserie">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <select class="form-control" name="" id="lorem">
                                                <option selected disabled> Règles </option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-modules" role="tabpanel" aria-labelledby="nav-modules-tab">
                        <div class="row">
                            <div class="col-lg-12 text-left mb-4">
                                <button class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <DataTable :data="comments" :columns="columnsModules" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                            </div>
                        </div>
                        
                        <div class="row mt-4 justify-content-center">
                            <div class="col-lg-6">
                                <form action="#">
                                    <legend>Ajouter un module</legend>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Finition Extérieure">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type Isolant">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Type de couverture">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <input type="text" class="form-control" id="lorem" placeholder="Qualité huisserie">
                                        </div>
                        
                                        <div class="form-group col-lg-6">
                                            <!-- <label for="feLastName">Truc</label> -->
                                            <select class="form-control" name="" id="lorem">
                                                <option selected disabled> Règles </option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
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
            columnsRange: [
                {name: "reference",         th: "Référence"},
                {name: "external_finition", th: "Finition extérieure"},
                {name: "insulator",         th: "Type d'isolant"},
                {name: "covering",          th: "Type de couverture"},
                {name: "window_frame",      th: "Qualité huisserie"},
                {name: "rule",              th: "Règles"},
            ],
            columnsComponents: [
                {name: "name",              th: "Nom de la famille"},
                {name: "description",       th: "Description"},
            ],
            columnSuppliers: [
                {name: "firstname", th: "Nom"},
                {name: "lastname", th: "Prénom"},
                {name: "street", th: "Adresse"},
                {name: "email", th: "Email"},
                {name: "phone", th: "Téléphone"},
                {name: "fax", th: "Fax"},

            ],
            columnsModules: [
                {name: "name", th: "Référence"},
                {name: "description", th: "Description"},
                {name: "tva", th: "TVA"},
                {name: "price", th: "Prix"},
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