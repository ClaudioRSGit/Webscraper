<template>
  <div>

    <div class="modal fade" id="chooseWishlistModal" tabindex="-1" aria-labelledby="chooseWishlistModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="chooseWishlistModalLabel">Escolha a sua lista de desejos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="submitForm">
              <div class="mb-3">
                <label for="wishlistSelect" class="form-label">Selecione a lista de desejos:</label>
                <select class="form-select" id="wishlistSelect" v-model="selectedWishlist">
                  <option v-for="wishlist in userWishLists" :key="wishlist.id" :value="wishlist.id">{{ wishlist.name }}</option>
                  <option value="nova_lista">Nova Lista de Desejos</option>
                </select>
                <div v-if="successMessage" class="alert alert-success mt-2" role="alert">
                  {{ successMessage }}
                </div>
              </div>
              <div v-if="selectedWishlist === 'nova_lista'">
                <label for="wishlistName" class="form-label">Nova Lista:</label>
                <input type="text" class="form-control mb-2" id="wishlistName" v-model="wishlistName">
                <button type="button" class="btn btn-success w-100 mb-3" @click="createWishlist()">Criar Nova Lista</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { getuserWishLists, getAuthenticatedUser } from '@/services/http.js';
import axiosInstance from '@/services/http.js';

export default {
  name: 'AddProductToWishListModal',
  props: {
    prodID: String,
  },
  setup(props) {
    const selectedWishlist = ref(null);
    const userWishLists = ref([]);
    const authUser = ref('');
    const wishlistName = ref('');
    const successMessage = ref('');

    const openModal = () => {
      $('#chooseWishlistModal').modal('show');
    };

    const submitForm = async () => {
      try {
        if (selectedWishlist.value === 'nova_lista') {
          return;
        }
        console.log('selectedWishlist', selectedWishlist.value, 'prodID', props.prodID);
        await axiosInstance.post('/createProductList', {
          wishlist_id: selectedWishlist.value,
          product_id: props.prodID
        });

        $('#chooseWishlistModal').modal('hide');
      } catch (error) {
        console.error(error);
      }
    };

    const createWishlist = async () => {
      await axiosInstance.post('/createWishList', { 
        name: wishlistName.value,
        user_id: authUser.value.id
      });
      wishlistName.value = '';

      selectedWishlist.value = null;

      successMessage.value = 'Lista criada com sucesso!';
      setTimeout(() => {
        successMessage.value = '';
      }, 1000);

      userWishLists.value = await getuserWishLists(authUser.value.id);
    };

    onMounted(async () => {
      try {
        const responseUser = await getAuthenticatedUser();
        authUser.value = responseUser;

        userWishLists.value = await getuserWishLists(authUser.value.id);
      } catch (error) {
        console.error('Erro ao carregar as listas de desejos do usuário:', error);
      }
    });

    return {
      selectedWishlist,
      userWishLists,
      authUser,
      wishlistName,
      successMessage,
      openModal,
      submitForm,
      createWishlist
    };
  },
};
</script>

<style scoped>
.alert-success {
  transition: 1s ease-in-out;
}
</style>
