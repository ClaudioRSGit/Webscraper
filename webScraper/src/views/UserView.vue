<template>
  <h2 class="container my-5">Bem vindo {{ authUser.firstName }}</h2>
  <div class="container">
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
            <input type="text" class="form-control" id="firstName" :value="authUser.firstName" readonly>
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Último Nome:</label>
            <input type="text" class="form-control" id="lastName" :value="authUser.lastName" readonly>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" :value="authUser.email" readonly>
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
        <h3 class="mt-3">Listas de Desejos</h3>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { getAuthenticatedUser } from '@/services/http.js';
import axiosInstance from '@/services/http.js';
const authUser = ref('');

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
    authUser.value = updatedUserResponse;
    isEditing.value = false;
  } catch (error) {
    console.error(error);
  }
};


(async () => {
  try {
    const response = await getAuthenticatedUser();
    authUser.value = response;
  } catch (error) {
    console.error(error);
  }
})();
</script>

<style scoped>
</style>
