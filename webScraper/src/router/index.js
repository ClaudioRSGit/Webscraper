import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import NotFound from '../components/NotFound.vue'
import {useAuth} from '@/stores/auth.js'
import routes from '@/router/routes.js'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../views/ProductsView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue')
    },
    {
      path: '/administration',
      name: 'administration',
      component: () => import('../views/AdministrationView.vue'),
         meta: {
         auth: true
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('../components/NotFound.vue')
    }
  ]
})

//before each route check if user is logged in
router.beforeEach(routes);

export default router
