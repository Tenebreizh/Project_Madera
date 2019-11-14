<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Utilisateur</h2>
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
                                        <input type="text" class="form-control" id="firstname" name="firstname" v-model="user.firstname">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="lastname">Prénom:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" v-model="user.lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr" v-model="user.email">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="pwd">Mot de passe:</label>
                                        <input type="password" class="form-control" id="pwd" name="pwd">
                                    </div>
                                </div>             
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label for="email">Rôle:</label>
                                        <select name="role" class="form-control" v-model="user.user_type_id">
                                            <option v-for="(role, key) in roles" :value="role.id" :key="key"> {{ role.name }} </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-primary btn-lg" @click="updateUser()">Valider</button>
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

        updateUser() {
            let id = this.$route.params.id

            axios.put('/api/user/' + id, this.user)
            .then(response => {
                alert('User Updated !')
                this.$noty.success("User updated !")
            })
        },

        getRoles() {
            axios.get('/api/userTypes')
            .then(response => {
                this.roles = response.data
            })
        }
    },

    mounted() {
        this.getUser()
        this.getRoles()
    }
}
</script>

<style>

</style>