<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Module</h2>
                    <div class="row card-body">
                        <div class="col">
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference" name="reference" v-model="module.name">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" v-model="module.description"></textarea>
                            </div>
                            <div class="col form-group">
                                <label for="tva">TVA:</label>
                                <input type="text" class="form-control" id="tva" name="tva" v-model="module.tva">
                            </div>
                            <div class="col form-group">
                                <label for="price">Prix:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" v-model="module.price">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="price">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col form-group">
                                <br>
                                <h3></label>Composants</h3>
                                <DataTable :data="components" :columns="columnsComponents" :index="false" :loading="loadingData"></DataTable>
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
        return{
            loadingData: false,
            columnsComponents: [
                {name: "name", th: "Name"},
                {name: "description", th: "Description"},
            ],
            modules:[],
            module:{
            },
            components:[]
        }
    },

    methods:{
        
        getModuleComponents(){
            this.loadingData = true
            axios.get("/api/module/" + this.module.id + "/components")
            .then(response => {
                this.components = response.data
                this.loadingData = false
            })
        },

        getModule(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get("/api/module/"+id)
            .then(response => {
                this.module = response.data
                this.getModuleComponents()
                this.loadingData = false
            })
        },        

    },

    mounted() {
        this.getModule()
    }

}
</script>

<style>

</style>