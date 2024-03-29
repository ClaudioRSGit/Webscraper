import './assets/main.css'

import { createApp, markRaw } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import { useAuth } from './stores/auth'

const app = createApp(App)

const pinea = createPinia();

// pinea.use(({store}) => {store.router = markRaw(router)});

app.use(pinea)
app.use(router)

const authStore = useAuth();

authStore.checkToken();

app.mount('#app')
