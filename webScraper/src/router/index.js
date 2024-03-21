import { createRouter, createWebHistory } from 'vue-router'
import routes from '@/router/routes.js'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
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
      path: '/product/:id',
      name: 'productDetails',
      component: () => import('../views/ProductDetailsView.vue'),
      props: true
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
        auth: true,
        admin: true
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('../components/NotFound.vue')
    }
  ]
})

// before each route check if user is logged in
router.beforeEach(routes);

export default router
