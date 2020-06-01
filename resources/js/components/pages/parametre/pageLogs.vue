<template>
 <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Log</h2>
                    <div class="row card-body">
                        <div class="col-sm-10">
                            <div class="col-sm-12">
                                <div class="row mt-5">
                                    <div class="col-sm-4 form-group">
                                        <label for="user">Utilisateur:</label>
                                        <input type="text" class="form-control" id="user" name="user" v-model="log.user_id">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="action">Action:</label>
                                        <input type="text" class="form-control" id="action" name="v" v-model="log.action_id">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="table">Table:</label>
                                        <input type="text" class="form-control" id="cp" name="table" v-model="log.table">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-2 form-group">
                                        <label for="name">Nom:</label>
                                        <input type="text" class="form-control" id="name" name="name" v-model="log.name">
                                    </div>
                                    <div class="col-sm-8 form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" id="description" name="description" v-model="log.description">
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
export default {
    data() {
        return {
            log:{
                user_id:'',
                description:'',
                action_id:'',
                name:'',
                table:''
            },
        }
    },

    methods:{
        getLog(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get("/api/log/"+ id)
            .then(response => {
                this.log = response.data
                this.loadingData = false
            })
        },
    },

    mounted(){
        // this.getLog()
    }
}
</script>

<style>

</style>