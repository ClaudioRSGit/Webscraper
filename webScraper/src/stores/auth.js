import { ref, computed } from 'vue';
import { defineStore } from 'pinia'
import  http  from '@/services/http.js'
import router from '../router'

export const useAuth = defineStore('auth', () => {
    const token = ref(localStorage.getItem('token'));
    const user = ref(JSON.stringify(localStorage.getItem('user') || '{}'));
    const isAuth = ref(false);

    // if (token) {
    //     try {
    //       const parsedToken = JSON.stringify(token);
    //     } catch (error) {
    //       console.error('Error parsing token:', error);
    //     }
    // }

    function setToken(tokenValue){
        localStorage.setItem('token', tokenValue);
        token.value = tokenValue;
    }

    function setUser(userValue){
        localStorage.setItem('user', JSON.stringify(userValue));
        user.value = userValue;
    }

    function setIsAuth(auth){
        isAuth.value = auth;
    }

    const isAuthenticated = computed(()=>{
        return token.value && user.value;
    })

    const fullName = computed(() =>{
        if (user.value) {
            return `${user.value.firstName} ${user.value.lastName}`;
        }
        return '';
    })

    function logout () {
        clear();
        router.push({name:'login'});
    }

    function clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        iaAuth.value = false;
        token.value = '';
        user.value = '';
    }

    async function checkToken(){
        try{
            //add token to request header on Bearer format
            const tokenAuth = 'Bearer ' + token.value;
            //send request to server to verify token
            const data = await http.get('/auth/verify', {
                headers: {
                    Authorization: tokenAuth,
                }
            });
            return data;
        }
        catch(error){
            clear();
            router.push({name: 'login'});
            console.log('error:' + error.response.data);
        }
    }

    function logout () {
        isAuth.value = false;
        clear();
        router.push({name:'login'});
      }

    return {
        token,
        user,
        setToken,
        setUser,
        checkToken,
        isAuthenticated,
        fullName,
        clear,
        isAuth,
        setIsAuth,
        logout
    }
})
