import {useAuth} from '@/stores/auth.js'

export default async function routes(to,from,next){
  const auth = useAuth();
  const requiresAuth = to.meta?.auth;
  
  try {
    if (!auth.token && requiresAuth) {
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