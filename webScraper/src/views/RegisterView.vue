<template>
    <section class="px-4 px-md-5 text-center text-lg-start mb-4 register mt-5">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight text-danger">
              Eletronics Scraper <br />
            </h1>
            <h2>Crie a sua conta de forma 100% gratuita!</h2>
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
                <div class="card-body py-5 px-md-5" style="text-align: left;">
                <form @submit.prevent="Register">
                    <div class="d-flex justify-content-between">
                    <div class="form-outline mb-4 d-flex flex-column">
                        <label class="form-label" for="userFirstName">Primeiro Nome</label>
                        <input type="text" v-model="user.firstName" class="form-control w-" />
                    </div>
                    <div class="form-outline mb-4 d-flex flex-column">
                        <label class="form-label" for="userLastName">Último Nome</label>
                        <input type="text" v-model="user.lastName" class="form-control" />
                    </div>
                  </div>
                  <div class="form-outline mb-4 d-flex flex-column">
                    <label class="form-label" for="userEmail">Email</label>
                    <input type="email" v-model="user.email" class="form-control" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="userPassword">Password</label>
                    <input type="password" v-model="user.password" class="form-control" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="confirmPassword">Confirme a Password</label>
                    <input type="password" v-model="confirmPassword" class="form-control" />
                  </div>
                  <div class="d-flex w-100 gap-2"> 
                  <button type="submit" class="btn btn-danger btn-block w-100">
                    Criar conta
                  </button>
                  </div>             
                </form>
                <p class="text-center mt-3">Já é cliente? <a class="text-danger fw-bold"ref="/login">Login</a></p>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
<script>
import { reactive, ref } from 'vue';
import { useAuth } from '@/stores/auth.js';
import { useRouter } from 'vue-router';
import { registerUser, loginUser } from '@/services/http.js';

export default{
    name: 'register',
    setup(){
        const auth = useAuth();
        const router = useRouter();
        const confirmPassword = ref('');
        const user = reactive({
            email: '',
            password: '',
            firstName: '',
            lastName: '',
            isActive: 0,
            role_id: 2
        });

        async function Register() {
            try {
                if (user.password != confirmPassword.value) {
                    console.log('user password: ' + user.password + '| confirm password: ' + confirmPassword.value);
                    alert('As passwords não coincidem');
                    return;
                }

                const response = await registerUser(user);
                if (response.status === 200) {
                    const { token, user: userData } = await loginUser(user);
                    auth.setToken(token);
                    auth.setUser(userData);
                    auth.setIsAuth(true);
                    router.push({ name: 'administration' });
                } else {
                    router.push({ name: 'login' });
                }
            } catch (error) {
                console.log(error?.response?.data);
            }
        }
                return {
            user,
            Register,
            confirmPassword,
            registerUser,
            loginUser,
            auth,
            router
        }
    }
}
</script>
  
  <style scoped>
.register{
  min-height: 100vh;
}
  </style>
