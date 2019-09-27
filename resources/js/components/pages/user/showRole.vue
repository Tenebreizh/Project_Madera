<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <div class="row card-body">
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            <h2>Rôle</h2>
                            <div class="row mt-5">
                                <div class="col form-group">
                                    <label for="name">Nom:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="col form-group">
                                    <label for="designation">Désignation:</label>
                                    <input type="text" class="form-control" id="designation" name="designation">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <DataTable :data="comments" :columns="droit"  :actions="actionsDroit" :index="false" :loading="loadingData"></DataTable>
                        </div>
                    </div>
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary btn-lg">Valder</button>
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
            droit: [
                {name: "reference", th: "Référence"},
                {name: "desciption",  th: "Description"},
            ],
            comments: [],
            actionsDroit: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
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