<template>
    <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <!-- <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard"> -->
                  <i class="fas fa-tree text-success"></i>
                  <span class="d-none d-md-inline ml-1">Madera</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <!-- <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form> -->
          
          <div class="nav-wrapper">
            <ul class="nav flex-column">
                <li class="nav-item" v-for="(nav, key) in navs" :key="key" :class="{ 'active' : nav.name.includes($route.name.split('.')[0]) }">
                    <router-link :to="{name: nav.name}" class="nav-link" v-if="user.user_type_id && isAuthorizedNav(rights, user.user_type_id, nav.name)">
                        <i :class="nav.icon"></i>
                        <b>{{ nav.title }}</b>
                    </router-link>
                </li>
            </ul>
          </div>
        </aside>
</template>

<script>
export default {
    data() {
        return {
            navs: [
                {name: 'home', title: 'Accueil', icon: 'fas fa-home'},
                {name: 'catalog', title: 'Gestion du catalogue', icon: 'fas fa-list-ul'},
                {name: 'configuration', title: 'Configuration', icon: 'fas fa-cogs'},
                {name: 'project', title: 'Projet', icon: 'fas fa-receipt'},
                {name: 'customer', title: 'Clients', icon: 'fas fa-user-tag'},
                {name: 'user', title: 'Utilisateurs', icon: 'fas fa-users'},
            ],
            user: {},
            rights: {
              16: ['home', 'project', 'catalog', 'customer'], // Commercial
              18: ['home', 'project', 'catalog', 'configuration'], // Bureau d'étude
              20: ['home'], // Client
              22: ['home', 'project', 'client'], // Comptabilité
              24: ['home', 'catalog', 'configuration', 'project', 'customer', 'user'], // Admin
              0: ['home', 'catalog', 'configuration', 'project', 'customer', 'user'] // Generic
            },
        }
    },

    methods: {
      getUser() {
        axios.get('/api/user')
        .then(response => {
          this.user = response.data
        })
      },

      isAuthorizedNav(rights, type, item) {
        if (type < 16 || type > 24) {
          return true
        }
        else if (rights[type].includes(item)) {
          return true
        }
        else {
          return false
        }

      }
    },

    mounted() {
      this.getUser()
    }
}
</script>

<style>

</style>