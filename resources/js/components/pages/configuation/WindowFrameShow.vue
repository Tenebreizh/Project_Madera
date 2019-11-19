<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Huisserie</h2>
                    <div class="card-body">
                        <div class="col form-group">
                            <label for="reference">Référence:</label>
                            <input type="text" class="form-control" id="reference" name="reference" v-model="windowFrame.reference">
                        </div>
                        <div class="col form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" id="description" v-model="windowFrame.reference"></textarea>
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
    data(){
        return{
            windowFrame:{
                label:'',
                description:'',
                reference:''
            },
        }
    },

    methods:{
        getwindowFrame(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get("/api/windowFrame/"+id)
            .then(response => {
                this.windowFrame = response.data
                this.loadingData = false
            })
        },
    },

    mounted() {
        this.getwindowFrame()
    },
}
</script>

<style>

</style>