<template>
    <div>
        <div id="formContent">
            <div id="container-login" class="row">
                <div id="bloc-left" class="col-sm-3"></div>
                <div id="form" class="card text-center col-sm-6 p-4">
                    <form @submit.prevent="login()">
                        <div class="col align-self-center form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" id="login" class="form-control" name="login" placeholder="Email" v-model="user.email" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" v-model="user.password" required>
                                </div>
                            </div>
                            <input type="submit" class="form-control mt-3 btn-success" value="Log In">
                        </div>
                    </form>
                    <div id="formFooter">
                        <a class="underlineHover" href="#">Forgot Password?</a>
                    </div>
                </div>
                <div id="bloc-right" class="col-sm-3"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            error: false,
            loading: false,

            user: {
                email: '',
                password: '',
            }
        };
    },

    methods: {
        login() {
            this.loading = true
            this.error = false

            axios.post('/api/login', this.user)
            .then(response => {
                this.loading = false
                auth.login(response.data.token)
                window.location.href = '/'
                // this.$router.push({name: 'home'})
            })
            .catch(response => {
                this.loading = false
                this.error = true
            });
        }
    }
}
</script>

<style>

</style>