<template>
  <header class="header" v-if="!isPaginaOculta">
    <div class="container px-lg-3">
      <nav class="navbar navbar-expand-lg py-3 px-lg-0">
        <span class="navbar-brand">
          <router-link class="fw-bold text-uppercase text-dark" :to="{ name: 'home' }">E Scraper</router-link>
        </span>
        <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'products' }">Produtos</router-link>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">               
            <li class="nav-item" v-if="auth.isAuth">
              <router-link class="nav-link" :to="{ name: 'administration' }">Administração</router-link>
            </li>
            <li class="nav-item" v-if="auth.isAuth">
              <i class="far fa-heart me-3"></i>
              <i class="fas fa-user me-3 text-gray fw-normal"></i>
              <button class="btn btn-outline-secondary" @click="logout">Sair</button>
            </li>
            <li v-else>
              <router-link class="btn btn-outline-secondary" :to="{ name: 'login' }">Login</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <router-view></router-view>
      
</template>

<script>
import { useAuth } from '@/stores/auth.js'
import { useRouter } from 'vue-router'

export default{
  name: 'navbar',
  setup(){
    const auth = useAuth();
    const router = useRouter();

    if (auth.isAuth) {
      if (auth.user.role_id === 1) {
          router.push({ name: 'administration' });
      } else {
          router.push({ name: 'home' });
      }
    }

    function logout() {
      auth.logout();
      router.push({name:'login'});
    }

    return {
      auth,
      router,
      logout
    }
  },
  computed: {
    isPaginaOculta() {
      return this.$route.name === 'administration';
    },
  },
}
</script>

<style scoped>

</style>