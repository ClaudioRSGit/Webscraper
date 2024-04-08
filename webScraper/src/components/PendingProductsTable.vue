<template>
    <div class="card mb-4 mt-3">
      <div class="card-header pb-0 d-flex justify-content-between">
        <h5 class="fw-bold">Pending Products</h5>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in pendingProducts" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.title }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.category }}</td>
                <td>{{ product.brand }}</td>
                <td>{{ product.link }}</td>
                <td class="align-middle d-flex justify-content-around">
                  <i class="fas fa-trash"@click="deleteProduct(product.id)"></i>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" @click="acceptProduct(product)">
                  <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                </svg>
                </td>
              </tr>
              <tr v-if="pendingProducts.length === 0">
                <td colspan="7" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  No pending products to show
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import { getPendingProducts, deletePendingProduct, createProduct } from '@/services/http.js';
  
  export default {
    setup() {
      const pendingProducts = ref([]);
  
      const fetchPendingProducts = async () => {
        try {
          pendingProducts.value = await getPendingProducts();
        } catch (error) {
          console.error(error);
        }
      };
  
      const deleteProduct = async (productId) => {
        try {
          await deletePendingProduct(productId);
          await fetchPendingProducts();
        } catch (error) {
          console.error(error);
        }
      };

      const acceptProduct = async (product) => {
      try {
        const acceptedProduct = {
          title: product.title,
          description: product.description,
          brand: product.brand,
          avg_rating: 0,
          category_id: 1,
          isActive: 0,
          image_link: product.link
        };
        
        await createProduct(acceptedProduct);
        
        await deletePendingProduct(product.id);
        
        await fetchPendingProducts();
      } catch (error) {
        console.error(error);
      }
    };

      onMounted(fetchPendingProducts);
  
      return {
        pendingProducts,
        deleteProduct,
        acceptProduct,
        createProduct
      };
    },
  };
  </script>
  
  <style scoped>
 table{
    color: darkgray!important;
 }
 svg{
    height:20px;
    width: 20px;
    fill: green;
    border: 1px solid green;
    border-radius: 50%;
    cursor: pointer;
 }

  </style>
  