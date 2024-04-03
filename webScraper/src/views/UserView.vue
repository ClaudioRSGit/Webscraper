<template>
  <h2 class="container my-5">Bem vindo <b class="fw-bold text-danger">{{ authUser.firstName }}</b></h2>
  <div class="container mb-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Perfil</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Listas de desejos</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active mb-5" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3 class="mt-3">Informações da Conta</h3>
        <div v-if="!isEditing">
          <div class="mb-3">
            <label for="firstName" class="form-label">Primeiro Nome:</label>
            <input type="text" class="form-control text-danger" id="firstName" :value="authUser.firstName" readonly>
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Último Nome:</label>
            <input type="text" class="form-control text-danger" id="lastName" :value="authUser.lastName" readonly>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control text-danger" id="email" :value="authUser.email" readonly>
          </div>
          <button class="btn btn-danger w-100" @click="editUser">Editar</button>
        </div>
        <div v-else>
          <form @submit.prevent="updateUser">
            <div class="mb-3">
              <label for="firstName" class="form-label">Primeiro Nome:</label>
              <input type="text" class="form-control" id="firstName" v-model="editedUser.firstName" required>
            </div>
            <div class="mb-3">
              <label for="lastName" class="form-label">Último Nome:</label>
              <input type="text" class="form-control" id="lastName" v-model="editedUser.lastName" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" v-model="editedUser.email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Nova Senha:</label>
              <input type="password" class="form-control" id="password" v-model="editedUser.password">
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirmar Nova Senha:</label>
              <input type="password" class="form-control" id="confirmPassword" v-model="editedUser.confirmPassword">
            </div>
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-danger w-50">Salvar</button>
              <button type="button" class="btn btn-secondary w-50" @click="cancelEdit">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="d-flex justify-content-between">
          <div>
            <h3 class="mt-3">Lista de Desejos</h3>
          </div>
          <div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" @click="toggleSvgHolderVisibility()" style="height: 15px; margin-top: 15px;"><path fill="#000" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" @click="openCreateWishlistModal" style="height: 20px; margin-top: 15px; margin-left: 20px;">
          <path fill="#000" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
        </svg>
        </div>
        </div>
        <div v-for="(wishList, index) in userWishLists">
          <div class="d-flex justify-content-between">
            <span class="fw-bold text-danger">{{ wishList.name }}
          </span>
          <div v-if="showSvgHolder" class="svg-holder">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" @click="deleteWishlists(wishList.id)">
            <path fill="#ee3000" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" @click="openModal(wishList.id)"><path fill="#ee3000" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
            </svg>
          </div>
        </div>
        <ul v-if="wishList.products.length > 0">
          <div class="row">
            <div class="col-3" v-for="(product,id) in wishList.products">
              <div class="card my-3">
                <div class="card-body p-2">
                  <img :src="product.image[0].link" alt="Product Image" class="card-img-top" style="height: 200px;">
                  <h5 class="card-title">{{ product.title }}</h5>
                </div>
                <div class="d-flex justify-content-around">
                  <span class="card-title fw-bold text-danger">{{ product.lowestPrice }} €</span>
                  <svg xmlns="http://www.w3.org/2000/svg" @click="openModal(wishList.id)" viewBox="0 0 512 512"><path fill="#ff0000" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                  </svg>
                  <svg @click="deleteProductFromWishlist(wishList.id, product.id)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#ff0000" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </ul>
        <div v-else>
          <h5>Nenhum produto adicionado</h5>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Nome da Lista</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="updateWishlistName">
          <div class="field">
            <label class="label">Nome Atual:</label>
            <div class="control mt-2">
              <input class="form-control" type="text" :value="userWishLists.find(list => list.id === wishlistId)?.name" readonly>
            </div>
          </div>
          <div class="field">
            <label class="label mt-2">Novo Nome:</label>
            <div class="control">
              <input class="form-control" type="text" v-model="newWishlistName" required>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-danger" @click="updateWishlistName">Salvar</button>
      </div>
    </div>
  </div>
</div>
<createWishlistModal></createWishlistModal>
<DeleteConfirmationModal @confirm="deleteConfirmed"></DeleteConfirmationModal>
</template>

<script setup>
import { ref } from 'vue';
import { getAuthenticatedUser, getuserWishLists } from '@/services/http.js';
import axiosInstance from '@/services/http.js';
import DeleteConfirmationModal from '@/components/modals/DeleteConfirmationModal.vue';
import CreateWishlistModal from '@/components/modals/CreateWishListModal.vue';

const authUser = ref('');
const userWishLists = ref([]);
const isEditing = ref(false);
let wishlistIdToDelete = null;
const editedUser = ref({
  firstName: '',
  lastName: '',
  email: '',
  password: '',
  confirmPassword: ''
});
const newWishlistName = ref('');
const wishlistId = ref(null);
const openModal = (id) => {
  wishlistId.value = id;
  const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
  modal.show();
};
const showSvgHolder = ref(false);
const toggleSvgHolderVisibility = () => {
  showSvgHolder.value = !showSvgHolder.value;
};
const deleteConfirmed = async () => {
  try {
    await axiosInstance.delete(`/destroyWishlist/${wishlistIdToDelete}`);
    const updatedLists = await getuserWishLists(authUser.value.id);
    userWishLists.value = updatedLists;
    $('#deleteConfirmationModal').modal('hide');
  } catch (error) {
    console.error(error);
  }
};
const deleteWishlists = (wishlistId) => {
  wishlistIdToDelete = wishlistId;
  const modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
  modal.show();
};
const openCreateWishlistModal = async () => {
  const modal = new bootstrap.Modal(document.getElementById('createWishlistModal'));
  modal.show();
};
const updateWishlistName = async () => {
  try {
    await axiosInstance.put(`/updateWishList/${wishlistId.value}`, {
      name: newWishlistName.value
    });
    const updatedLists = await getuserWishLists(authUser.value.id);
    userWishLists.value = updatedLists;
    $('#exampleModal').modal('hide');
    newWishlistName.value = '';
  } catch (error) {
    console.error(error);
  }
};

const editUser = () => {
  isEditing.value = true;
  editedUser.value = {
    firstName: authUser.value.firstName,
    lastName: authUser.value.lastName,
    email: authUser.value.email,
    password: '',
    confirmPassword: ''
  };
};

const deleteProductFromWishlist = async (wishlistId, productId) => {
  try {
    await axiosInstance.delete(`/wishlist/${wishlistId}/product/${productId}`);

    const updatedLists = await getuserWishLists(authUser.value.id);
    userWishLists.value = updatedLists;
  } catch (error) {
    console.error(error);
  }
};

// const deleteWishlists = async (wishlistId) => {
//   try {
//     await axiosInstance.delete(`/destroyWishlist/${wishlistId}`);

//     const updatedLists = await getuserWishLists(authUser.value.id);
//     userWishLists.value = updatedLists;
//   } catch (error) {
//     console.error(error);
//   }
// };

const cancelEdit = () => {
  isEditing.value = false;
  editedUser.value = {
    firstName: '',
    lastName: '',
    email: '',
    password: '',
    confirmPassword: ''
  };
};
const updateUser = async () => {
  try {
    const response = await axiosInstance.put(`/updateUser/${authUser.value.id}`, {
      firstName: editedUser.value.firstName,
      lastName: editedUser.value.lastName,
      email: editedUser.value.email,
      password: editedUser.value.password,
      role_id: authUser.value.role_id,
      isActive: authUser.value.isActive
    });
    const updatedUserResponse = await getAuthenticatedUser();
    isEditing.value = false;
  } catch (error) {
    console.error(error);
  }
};

(async () => {
  try {
    const responseUser = await getAuthenticatedUser();
    authUser.value = responseUser;

    const responseLists = await getuserWishLists(authUser.value.id);
    userWishLists.value = responseLists;
  } catch (error) {
    console.error('error: ' + error);
  }
})();

</script>

<style scoped>
img{
  object-fit:contain;  
  transition: 0.4s;
  cursor: pointer;
}
.card{
  min-width: 15dvw!important;
  max-width: 15dvw!important;
  max-height: 40dvh;
}
.card-title{
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.row{
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
  gap: 10px;
}
::-webkit-scrollbar {
  height: 8px;
}

::-webkit-scrollbar-thumb {
  background-color: red;
  border-radius: 4px;
}
svg{
  height: 25px;
  cursor: pointer;
}
.svg-holder svg{
  width: 15px;
  margin-left: 10px;
}
</style>
