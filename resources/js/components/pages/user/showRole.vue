<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Rôle</h2>
                    <div class="row card-body">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <h2>Rôle</h2>
                                <div class="row mt-5">
                                    <div class="col form-group">
                                        <label for="name">Nom:</label>
                                        <input type="text" class="form-control" id="name" name="name" v-model="role.name">
                                    </div>
                                    <div class="col form-group">
                                        <label for="designation">Désignation:</label>
                                        <input type="text" class="form-control" id="designation" name="designation" v-model="role.description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-primary btn-lg">Valider</button>
                        </div>
                    </div>
                </form>
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
            role:{},
            comments: [],
            actionsDroit: [
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    alert("Delete: " + row.id);
                }},
            ]
        }
    },

    methods:{
        getRole(){
            let id = this.$route.params.id
            axios.get("/api/userType/"+id)
            .then(response => {
                this.role = response.data
                this.loadingData = false
            })
        }
    },

    mounted() {
        this.getRole()
    }
}
</script>

<style>

</style>