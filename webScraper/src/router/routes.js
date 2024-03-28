import { useAuth } from '@/stores/auth.js'

export default async function routes(to, from, next) {
  const auth = useAuth();
  const requiresAuth = to.meta?.auth;
  const requireAdmin = to.meta?.admin;
  
  try {
    // Check if the route requires authentication
    if (requiresAuth) {
      // Check if user is authenticated
      if (!auth.isAuth) {
        await auth.checkToken();
      }

      // Check authentication after token check
      if (auth.isAuth) {
        // Check if admin access is required
        if (auth.isAuth && auth.user && auth.user.role_id !== 1) {
          next({ name: 'login' });
        } else {
          // Redirect to administration if user is authenticated and has admin access
          if (to.name !== 'administration') {
            next({ name: 'administration' });
          } else {
            next();
          }
        }
      } else {
        // Redirect to login if user is not authenticated
        next({ name: 'login' });
      }
    } else {
      // Continue to the route if authentication is not required
      next();
    }
  } catch (error) {
    console.error('Error in route navigation:', error);
    next();
  }
}
