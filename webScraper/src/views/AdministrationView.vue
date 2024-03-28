<template>
    <div class="d-flex justify-content-between px-lg-3 ">
            <ul class="navbar ms-auto">      
            <li class="navbar-brand"><router-link class="fw-bold text-uppercase text-dark" :to="{ name: 'home' }">E Scraper</router-link></li>         
            <li class="nav-item"><router-link class="nav-link" :to="{ name: 'products' }">Products</router-link></li>
            <li class="nav-item">
              <i class="fas fa-user me-3 text-gray fw-normal"></i>
              <a class=" -outline-secondary" @click="logout">Sair</a>
            </li>
          </ul>
    </div>
 
    <div class="container">
      <div class="row">
        <div class="sidenav col-2">
            <aside class="mr-5 sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div class="sidenav-header">
            <a class="navbar-brand m-0">
                <img src="https://avatars.githubusercontent.com/u/28140896?s=280&v=4" class="navbar-brand-img h-100">
                <span class="ms-1 font-weight-bold">Administration Panel</span>
            </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item" @click="showTable('dashboard')" :class="{ 'active': activeItem === 'dashboard' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
                        </svg>
                        Dashboard
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('usersTable')" :class="{ 'active': activeItem === 'usersTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                        </svg>
                        Users
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('rolesTable')" :class="{ 'active': activeItem === 'rolesTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                        </svg>
                        Roles
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('productsTable')" :class="{ 'active': activeItem === 'productsTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/>
                        </svg>
                        Products
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('categoriesTable')" :class="{ 'active': activeItem === 'categoriesTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
                        </svg>
                        Categories
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('marketsTable')" :class="{ 'active': activeItem === 'marketsTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                        </svg>
                        Markets
                    </span>
                </a>
                </li>
                <li class="nav-item" @click="showTable('pendingProductsTable')" :class="{ 'active': activeItem === 'pendingProductsTable' }">
                <a class="nav-link">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                        </svg>
                        Pending Products
                    </span>
                </a>
                </li>
            </ul>
            </div>
        </aside>
        </div>
        <div class="content col-10">
            <component :is="currentTableComponent"></component>
        </div>
      </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import UsersTable from '@/components/UsersTable.vue';
import RolesTable from '@/components/RolesTable.vue';
import ProductsTable from '@/components/ProductsTable.vue';
import CategoriesTable from '@/components/CategoryTable.vue';
import MarketsTable from '@/components/MarketsTable.vue';
import Dashboard from '@/components/Dashboard.vue';
import PendingProductsTable from '../components/PendingProductsTable.vue';
import { useRouter } from 'vue-router'
import { useAuth } from '@/stores/auth.js';

const currentTableComponent = ref(null);
const activeItem = ref('dashboard');
const auth  = useAuth();
const router = useRouter();

function logout() {
    auth.logout();
}

function showTable(table) {
  switch(table) {
    case 'dashboard':
      currentTableComponent.value = Dashboard;
      break;
    case 'usersTable':
      currentTableComponent.value = UsersTable;
      break;
    case 'rolesTable':
      currentTableComponent.value = RolesTable;
      break;
    case 'productsTable':
      currentTableComponent.value = ProductsTable;
      break;
    case 'categoriesTable':
      currentTableComponent.value = CategoriesTable;
      break;
    case 'marketsTable':
      currentTableComponent.value = MarketsTable;
      break;
    case 'pendingProductsTable':
    currentTableComponent.value = PendingProductsTable;
    break;
    default:
      currentTableComponent.value = null;
  }
  activeItem.value = table;
}

onMounted(() => {
  showTable('dashboard');
});
</script>
<style scoped>
@import url('../assets/argon-dashboard.css');
    svg{
        width: 20px;
        height: 20px;
        margin-right: 10px;
        fill: rgb(13, 110, 253);
    }
    li{
        cursor: pointer;
        text-decoration: none!important;
    }
    .active {
      background-color: rgba(13, 110, 253, 0.2);
    }
    ul{
        display: flex;
        list-style: none;
        align-items: center;
        vertical-align: middle;
        text-decoration: none!important;
        box-shadow: none!important;
    }
    aside{
        max-height: 80vh;
    }
    .content{
        min-height: 80vh; 
    }
    #sidenav-collapse-main{
        min-height: 60vh;
    }
</style>