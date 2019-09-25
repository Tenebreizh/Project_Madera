<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center nav-justified">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" id="nav-roles-tab" data-toggle="tab" href="#nav-gammes" role="tab" aria-controls="nav-roles" aria-selected="true">Configuration gammes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link " id="nav-user-tab" data-toggle="tab" href="#nav-modules" role="tab" aria-controls="nav-user" aria-selected="false">Configuration modules</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row tab-content">
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Finition extérieur</h3>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="external_finitions" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type d'isolant</h3>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="isolators" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Type de couverture</h3>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="coverings" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 border tab-pane fade show active" id="nav-gammes" role="tabpanel" aria-labelledby="nav-gammes-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left m-2">
                                    <h3>Huisserie</h3>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col">
                                    <DataTable :data="comments" :columns="windows_frames" :actions="actions" :index="false" :loading="loadingData"></DataTable>
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
            external_finitions: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            isolators: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            coverings: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            windows_frames: [
                {name: "reference",     th: "Référence"},
                {name: "description",   th: "Description"},
            ],
            comments: [],
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-1", action: (row, index) => {
                    alert("See: " + row.id);
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-1", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-1", action: (row, index) => {
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