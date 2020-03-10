<template>
    <div class="main-navbar sticky-top bg-white">
        <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">  
            <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"></div>


            <ul class="navbar-nav border-left">   
                <li class="nav-item text-center">
                    <router-link :to="{name: navs[0].name}" class="nav-link">
                        <i class="fa fa-cog fa_custom fa-3x"></i>
                    </router-link>
                </li>
            </ul>
            <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                    <router-link :to="{name: 'userConnected.show', params: {id: user.id}}" class="nav-link text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle mr-2" src="/images/avatar/1.jpg" alt="User Avatar">
                        <span class="d-none d-md-inline-block"> {{ user.firstname }} </span>
                    </router-link>
                </li>
                <li class="nav-item dropdown" v-show="isUser" @click="logout()">
                    <button class="btn">
                        <i class="fas fa-sign-out-alt fa-3x"></i>
                    </button>
                </li>
            </ul>
            <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="fas fa-bars"></i>
                </a>
            </nav>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {},
            isUser: false,
            navs: [
                { name: 'parametre', title: 'Paramètre', icon: 'fas fa-home'},
            ]
        }
    },

    methods: {
        getUser() {
            if (window.localStorage.token) {
                this.isUser = true
                axios.get('/api/user')
                .then(response => {
                    this.user = response.data
                })
            }
        },

        logout() {
            this.isUser = false
            auth.logout()
            window.location.href = '/'
        }
    },

    mounted() {
        this.getUser()
    }
}
</script>

<style>

</style>