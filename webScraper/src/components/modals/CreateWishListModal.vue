<template>
    <div class="modal fade" id="createWishlistModal" tabindex="-1" aria-labelledby="createWishlistModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createWishlistModalLabel">Criar nova lista de Desejos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="createWishlist">
              <div class="mb-3">
                <label for="wishlistName" class="form-label">Nome da Lista:</label>
                <input type="text" class="form-control" id="wishlistName" v-model="wishlistName" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Criar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axiosInstance from '@/services/http.js';
  import { getuserWishLists, getAuthenticatedUser } from '@/services/http.js';

  const wishlistName = ref('');
  const authUser = ref('');
  const userWishLists = ref([]);

  const createWishlist = async () => {
    try {
        const responseUser = await getAuthenticatedUser();
        authUser.value = responseUser;
        
        await axiosInstance.post('/createWishList', { 
            name: wishlistName.value,
            user_id: authUser.value.id
        });
        
        userWishLists.value = await getuserWishLists(authUser.value.id);
        wishlistName.value = '';
        $('#createWishlistModal').modal('hide');
    } catch (error) {
        console.error(error);
    }
  };
  
  </script>
  
  <style scoped>
  </style>