import { ref, computed } from 'vue';
import { defineStore } from 'pinia'
import  http  from '@/services/http.js'
import router from '../router'

export const useAuth = defineStore('auth', () => {
    const user = ref({});
    const isAuth = ref(false);

    function setUser(userValue){
        user.value = userValue;
    }

    function setIsAuth(auth){
        isAuth.value = auth;
    }

    const isAuthenticated = computed(()=>{
        return user.value;
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
        isAuth.value = false;
        user.value = '';
        http.get('/auth/logout');
    }

    async function checkToken(){
        try{
            const data = await http.get('/auth/verify', {
            });
            const userInfo = data.user;
            setUser(userInfo);
            setIsAuth(true);
            return data;
        }
        catch(error){
            clear();
            router.push({name: 'login'});
        }
    }

    function logout () {
        isAuth.value = false;
        clear();
        router.push({name:'login'});
      }

    return {
        user,
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
