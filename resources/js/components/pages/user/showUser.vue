<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Utilisateur</h2>
                    <div class="row card-body">
                        <div class="col-sm-3 mt-5">
                            <div class="col">        
                                <img src="./../../../../../public/images/avatar/1.jpg" class="rounded-circle border" alt="Cinque Terre" width="" height="230"> 
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="row mt-5">
                                    <div class="col-sm-4 form-group">
                                        <label for="firstname">Nom:</label>
                                        <input type="text" class="form-control" :disabled="edit" id="firstname" name="firstname" v-model="user.firstname">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="lastname">Prénom:</label>
                                        <input type="text" class="form-control" :disabled="edit" id="lastname" name="lastname" v-model="user.lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" :disabled="edit" id="email" name="email"  placeholder="exemple@email.fr" v-model="user.email">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="email">Rôle:</label>
                                        <select name="role" class="form-control" :disabled="edit" v-model="user.user_type_id">
                                            <option v-for="(role, key) in roles" :value="role.id" :key="key"> {{ role.name }} </option>
                                        </select>
                                    </div>
                                </div>             
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-success btn-lg" @click="updateUser()">Modifier</button>
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
            user: {},
            roles: [],
            edit:false,
            connect_user:{}
        }
    },

    methods: {
        getUser() {
            let id = this.$route.params.id

            axios.get('/api/user/' + id)
            .then(response => {
                this.user = response.data
            })
        },

        getUserConnected(){
            axios.get('/api/user/')
            .then(response => {
                if (response.data.id == this.user.id){
                    console.log(response.data.id)
                    console.log(this.user.id)
                    this.edit = true
                }
            })
        },

        updateUser() {
            let id = this.$route.params.id
            Object.assign(this.user, {'user_id': this.connect_user.id})
            axios.put('/api/user/' + id, this.user)
            .then(response => {
                this.$noty.success("User updated !")
            })
        },

        getRoles() {
            axios.get('/api/userTypes')
            .then(response => {
                this.roles = response.data
            })
        },

        getUserConnect() {
            axios.get('/api/user')
            .then(response => {
                this.connect_user = response.data
            })
        },
    },

    mounted() {
        this.getUser()
        this.getRoles()
        this.getUserConnected()
        this.getUserConnect()
    }
}
</script>

<style>

</style>