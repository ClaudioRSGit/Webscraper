import './assets/main.css'

import { createApp, markRaw } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import { useAuth } from './stores/auth'

const app = createApp(App)

const pinea = createPinia();

pinea.use(({store}) => {store.router = markRaw(router)});

app.use(pinea)
app.use(router)

const authStore = useAuth();

if (localStorage.getItem('token')) {
    //iife
    (async () =>{
        const auth = useAuth();
        try {
            auth.setIsAuth(true);
            await auth.checkToken();
        } catch (error) {
            auth.setIsAuth(false);
        }
    })();
}

app.mount('#app')
