<template>
  <section class="px-4 py-5 px-md-5 text-center text-lg-start login">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight text-danger">
            Eletronics Scraper <br />
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Descubra a conveniência de encontrar os melhores eletrodomésticos 
            na nossa loja. Com a nossa tecnologia de scraping, garantimos acesso 
            às melhores ofertas e variedade de produtos, diretamente selecionados 
            das fontes mais confiáveis.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5" style="text-align: left;">
              <form @submit.prevent="Login">
                <div class="form-outline mb-4 d-flex flex-column">
                  <label class="form-label" for="userEmail">Email</label>
                  <input type="text" v-model="user.email" class="form-control" />
              </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="userPassword">Password</label>
                  <input type="password" v-model="user.password" class="form-control" />
                </div>
                <div class="d-flex w-100 gap-2">
                  <button type="submit" class="btn btn-danger btn-block w-100">
                  Iniciar Sessão
                </button>   
                </div>             
              </form>
              <p class="text-center mt-3">Ainda não é cliente? <router-link class="nav-link fw-bold text-danger" :to="{ name: 'register' }">Crie uma conta</router-link></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import http from '@/services/http.js'
import {reactive} from 'vue'
import {useAuth} from '@/stores/auth.js'
import {useRouter} from 'vue-router'
import {loginUser} from '@/services/http.js'
import { getAuthenticatedUser } from '@/services/http.js';

const auth = useAuth();
const router = useRouter();
const user = reactive({
  email: 'administrator@admin.com',
  password: 'Claranet123!'
})

async function Login() {
  try {
    const {
      token, 
      user: userData
    } = await loginUser(user);
    auth.setUser(userData);
    auth.setIsAuth(true);
    
    const responseUser = await getAuthenticatedUser();
    
    console.log(responseUser);
    if (responseUser.firstLogin === 1 && responseUser.isActive === 0 && userData.role_id !== 1) {
      router.push({name:'verification'});
    }
    else if (userData.role_id === 1) {
      router.push({name:'administration'});
    }
    else{
      router.push({name:'home'});
    }
  } catch (error) {
    console.log(error?.response?.data);
  }
}

</script>

<style scoped>
.login{
  min-height: 100vh;
}
</style>