<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Client</h2>
                    <div class="row card-body">
                        <div class="col-sm-2 mt-5">
                            <div class="col">        
                                <img src="./../../../../../public/images/avatar/Capture.png" class="rounded-circle border" alt="Cinque Terre" width="" height="230"> 
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="col-sm-12">
                                <div class="row mt-5">
                                    <div class="col-sm-4 form-group">
                                        <label for="firstname">Nom:</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" v-model="client.firstname">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="lastname">Prénom:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" v-model="client.lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-2 form-group">
                                        <label for="numero">N°:</label>
                                        <input type="text" class="form-control" id="numero" name="numero" v-model="client.street_number">
                                    </div>
                                    <div class="col-sm-8 form-group">
                                        <label for="street">Adresse:</label>
                                        <input type="text" class="form-control" id="street" name="street" v-model="client.street">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-1 form-group">
                                        <label for="cp">CP:</label>
                                        <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000" v-model="client.zipcode">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="city">Ville:</label>
                                        <input type="text" class="form-control" id="country" name="country" v-model='client.city'>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="country">Pays:</label>
                                        <input type="text" class="form-control" id="country" name="country" v-model='client.country'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-2 form-group">
                                        <label for="phone">Téléphone:</label>
                                        <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00" v-model="client.phone">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr" v-model="client.email">
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
    data(){
        return{
            client:{
                city_id:'',
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                email:'',
                phone:''
            },
        }
    },
    methods:{
        getClient(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get("/api/client/"+id)
            .then(response => {
                this.client = response.data
                this.loadingData = false
            })
        },
    },
    
    mounted() {
        this.getClient()
    }
}
</script>

<style>

</style>