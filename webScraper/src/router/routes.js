import {useAuth} from '@/stores/auth.js'
import { ref } from 'vue';

export default async function routes(to,from,next){
  const auth = useAuth();
  const requiresAuth = to.meta?.auth;
  const requireAdmin = to.meta?.admin;
  
  try {
    if (requiresAuth && requireAdmin && auth.user.role_id !== 1) {
      next({ name: 'login' });
    } else {
      // Check if the route requires authentication
      if (requiresAuth) {
        // Check if user is authenticated
        if (auth.isAuth) {
          next();
        } else {
          // Redirect to login if user is not authenticated
          next({ name: 'login' });
        }
      } else {
        // Continue to the route if authentication is not required
        next();
      }
    }
  } catch (error) {
    console.error('Error in route navigation:', error);
    next();
  }
}