<template>
  <header class="header" v-if="!isPaginaOculta">


    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Solicitar Novo Produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="submitForm">
              <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" v-model="newProduct.title" id="title" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" v-model="newProduct.description" id="description" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <input type="text" class="form-control" v-model="newProduct.category" id="category" required>
              </div>
              <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" class="form-control" v-model="newProduct.brand" id="brand" required>
              </div>
              <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" v-model="newProduct.link" id="link" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="container px-lg-3">
      <nav class="navbar navbar-expand-lg py-3 px-lg-0 d-flex justify-content-between">
        <div>
          <span class="navbar-brand">
          <router-link class="fw-bold text-uppercase text-red" :to="{ name: 'home' }">E Scraper</router-link>
        </span>
        </div>
        <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'products' }">Produtos</router-link>
            </li>
          </ul>


          <div class="searchbar-container">
            <input class="searchbar-input" type="text" v-model="searchQuery" placeholder="Procurar Produtos" aria-label="Search" aria-describedby="button-addon2" @input="getResults">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 20px;">
              <path fill="red" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
            </svg>
            <div class="searchResults overflowY" v-if="showsearchResults">
              <div class="p-4 btn" v-if="results.length === 0" @click="openModal">
                  Nenhum produto encontrado. Solicite um novo produto!
              </div>
                <div class="p-4 productsFound " v-for="(result, index) in results" :key="result.id" @click="selectItem(result.id, result.title)">
                  <a :href="`/product/${result.id}`">
                    <div class="showProduct">
                      <img :src="result.image[0].link">
                      <span>{{ result.title }}</span>
                    </div>
                  </a>
                </div>
              <div class="searchHistory">
                <h5 class="mt-2">Histórico de pesquisa</h5>
                <br>
                <div class="mb-1" v-if="searchHistory.length === 0 && auth.isAuth === false">Sem histórico de pesquisa</div>
                <div v-if="auth.isAuth === true">
                  <div class="mb-1" v-for="query in userSearchHistory" :key="query">
                      <svg xmlns="http://www.w3.org/2000/svg" style="height: 15px; margin-left: 30px;" viewBox="0 0 512 512">
                          <path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/>
                      </svg>
                      <span>{{ query.query }}</span>
                  </div>
              </div>
              <div v-else>
                  <div class="mb-1" v-for="query in searchHistory" :key="query">
                      <svg xmlns="http://www.w3.org/2000/svg" style="height: 15px; margin-left: 30px;" viewBox="0 0 512 512">
                          <path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/>
                      </svg>
                      <span>{{ query.title }}</span>
                  </div>
              </div>
              </div>
            </div>
          </div>

          <ul class="navbar-nav ms-auto">               
            <li class="nav-item" v-if="auth.isAuth && auth.user_id === 1">
              <router-link class="nav-link text-red" :to="{ name: 'administration' }">Administração</router-link>
            </li>
            <li class="nav-item" v-if="auth.isAuth">
              <!-- <router-link class="nav-link text-red" :to="{ name: 'userpanel' }"><i class="far fa-heart me-3"></i></router-link> -->
              <a href="/userpanel"><i class="fas fa-user me-3 text-gray fw-normal"></i></a>
              <a href="/userpanel"><i class="far fa-heart me-3 text-red"></i></a>
              <button class="btn btn-outline-danger" @click="logout">Sair</button>
            </li>
            <li v-else>
              <router-link class="btn btn-outline-secondary" :to="{ name: 'login' }">Login</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>

  </header>      
</template>

<script>
import { useAuth } from '@/stores/auth.js'
import { useRouter } from 'vue-router'
import axiosInstance from '@/services/http';
import { ref, computed, onMounted } from 'vue';
import { createSearchHistory, getSearchHistoryById, getAuthenticatedUser } from '@/services/http';

export default {
  name: 'navbar',
  setup() {
    const auth = useAuth();
    const router = useRouter();
    const userSearchHistory = ref([]);
    const searchQuery = ref('');
    const results = ref([]);
    const showsearchResults = ref(false);
    const searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
    const newProduct = ref({
      title: '',
      description: '',
      category: '',
      brand: '',
      link: ''
    });

    const getResults = () => {
      axiosInstance.get(`/products/search/${searchQuery.value}`)
        .then(response => {
          console.log('Response:', response.data);
          results.value = response.data;
          showsearchResults.value = true;
        })
        .catch(error => {
          console.log(error);
        });
    };

    const selectItem = (id, title) => {
      addToSearchHistory({ id, title });
      addToSearchHistoryAPI(title);
      searchQuery.value = '';
      showsearchResults.value = false;
    };

    const addToSearchHistory = async (product) => {
      const searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
      searchHistory.push(product);
      localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
    };

    const addToSearchHistoryAPI = async (title) => {
      try {
        await createSearchHistory({ query: title });
      } catch (error) {
        console.error(error);
      }
    };

    const logout = () => {
      auth.logout();
      router.push({ name: 'login' });
    };

    const submitForm = async () => {
      try {
        await axiosInstance.post('/createPendingProduct', newProduct.value);
        newProduct.value = {
          title: '',
          description: '',
          category: '',
          brand: '',
          link: ''
        };
        $('#myModal').modal('hide');
      } catch (error) {
        console.error(error);
      }
    };

    const handleClickOutside = (event) => {
      if (!event.target.closest('.searchbar-container')) {
        cleanQuery();
      }
    };

    const getHistoryById = async () => {
      try {
        const user = await getAuthenticatedUser();
        const response = await axiosInstance.get(`/searchHistory/${user.id}`);
        auth.user_id = user.id;
        userSearchHistory.value = response.data;
      } catch (error) {
        console.error(error);
      }
    };
    const cleanQuery = () => {
      searchQuery.value = '';
      showsearchResults.value = false;
    };

    const openModal = () => {
      cleanQuery();
      $('#myModal').modal('show');
    };

    document.addEventListener('click', handleClickOutside);


    const isPaginaOculta = computed(() => {
      return router.currentRoute.value.name === 'administration';
    });

    onMounted(getHistoryById);

    return {
      auth,
      searchQuery,
      results,
      showsearchResults,
      isPaginaOculta,
      getResults,
      selectItem,
      logout,
      searchHistory,
      newProduct,
      submitForm,
      openModal,
      userSearchHistory
    };
},
};
</script>

<style scoped>
.text-red {
  color: red;
}
.searchbar-input {
  width: 90%;
  padding: 1%;
  border: 1px solid red;
  border-radius: 15px;
}
.searchbar-container {
  width: 50% !important;
  position: relative;
  border-radius: 0.75rem;
  transition: all .2s ease-in-out;
}
svg {
  position: relative !important;
  right: 40px !important;
}
.searchResults {
  margin-top: 10px;
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  z-index: 10000;
  display: flex;
  flex-direction: column;
  border-radius: 0.75rem;
  transition: all .2s ease-in-out;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
}
.searchHistory{
  margin-left: 25px;
}
.searchResults img {
  margin-right: 10px;
  border-radius: 0.75rem;
  transition: all .2s ease-in-out;
  max-width: 50px !important;
  max-height: auto !important;
}
.showProduct {
  display: flex;
  align-items: center;
  cursor: pointer;
}
a{
  text-decoration: none;
  color: black;
}
.overflowY{
  overflow-y: scroll;
  max-height: 300px!important;
}
.overflowY::-webkit-scrollbar {
  width: 5px;
}
.productsFound:hover{
  background-color: rgba(255, 0, 0, 0.1);
}
</style>