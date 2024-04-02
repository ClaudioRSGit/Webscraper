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
        <h3 class="mt-3">Lista de Favoritos</h3>
        <div v-for="(wishList, index) in userWishLists">
        <h4 class="fw-bold text-danger">{{ wishList.name }}</h4>
        <ul v-if="wishList">
          <div class="row">
            <div class="col-3" v-for="(product,id) in wishList.products">
              <div class="card my-3">
                <div class="card-body p-2">
                  <img :src="product.image[0].link" alt="Product Image" class="card-img-top" style="height: 200px;">
                  <h5 class="card-title">{{ product.title }}</h5>
                </div>
                <div class="d-flex justify-content-around">
                  <span class="card-title fw-bold text-danger">{{ product.lowestPrice }} €</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                  </svg>
                  <svg @click="deleteProductFromWishlist(wishList.id, product.id)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#ff0000" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { getAuthenticatedUser, getuserWishLists } from '@/services/http.js';
import axiosInstance from '@/services/http.js';

const authUser = ref('');
const userWishLists = ref([]);
const isEditing = ref(false);
const editedUser = ref({
  firstName: '',
  lastName: '',
  email: '',
  password: '',
  confirmPassword: ''
});
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
</style>
