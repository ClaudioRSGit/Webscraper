<template>
    <div class="card mb-4 mt-3">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5 class="fw-bold">Roles</h5>
                <button type="button" class="btn btn-primary" @click="showModal">Add Role</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id - Description</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in roles" :key="role.id">
                        <td>
                          <div class="d-flex px-2 py-1">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/>
                              </svg>
                              <div class="d-flex flex-column justify-content-center">
                                  <span class="fw-bold text-dark mb-0 text-sm">#{{ role.id }}</span>
                                  <span class="text-xs text-secondary mb-0">{{ role.description }}</span>
                              </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <div class="d-flex justify-content-around">
                                  <i class="fas fa-edit" @click.prevent="editRole(role.id)"></i>
                                  <i class="fas fa-trash" @click.prevent="destroyRole(role.id)"></i>
                                </div>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
      </div>
  
    <!-- Modal - Passar para componente -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="roleModalLabel">Create Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form @submit.prevent="submitRole" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input class="form-control" type="text" v-model="description" id="description" name="description" placeholder="Insert description" required>
              </div>
              <div class="alert alert-danger" v-if="errors.length">
                <ul>
                  <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import { ref, onMounted } from 'vue';
  import { getRoles, deleteRole, createRole, updateRole } from '@/services/http.js';
  
  export default{

  name: 'RolesTable',
    setup() {
    const roles = ref([]);
    const description = ref('');
    const errors = ref([]);
    const roleIdToEdit = ref(null);
    
    const fetchRoles = async () => {
      try {
        roles.value = await getRoles();
      } catch (error) {
        console.error(error);
      }
    };
    
    const submitRole = async () => {
      errors.value = [];
      if (description.value) {
        try {
          if (roleIdToEdit.value) {
            await updateRole(roleIdToEdit.value, { description: description.value });
          } else {
            await createRole({ description: description.value });
          }
          description.value = '';
          $('#roleModal').modal('hide');
          fetchRoles();
        } catch (error) {
          console.error(error);
        }
      } else {
        errors.value.push('Description is required');
      }
    };
    const editRole = async (id) => {
      try {
        roleIdToEdit.value = id;
        const role = roles.value.find(role => role.id === id);
        if (role) {
          description.value = role.description;
          $('#roleModalLabel').text('Edit Role');
          $('#roleModal').modal('show');
        }
      } catch (error) {
        console.error(error);
      }
    };
    const destroyRole = async (id) => {
      try {
        await deleteRole(id);
        fetchRoles();
      } catch (error) {
        console.error(error);
      }
    };
    
    const showModal = () => {
      roleIdToEdit.value = null;
      description.value = '';
      $('#roleModalLabel').text('Create Role');
      $('#roleModal').modal('show');
    };
    
    onMounted(fetchRoles);
    
    return {
      roles,
      description,
      errors,
      submitRole,
      destroyRole,
      showModal,
      getRoles,
      deleteRole,
      createRole,
      updateRole,
      editRole
    };
  }
}
  </script>
  
  <style>
  @import url("../assets/table.css");
  i {
    cursor: pointer;
  }
  svg{
    margin-top: 8px;
    width: 30px;
    height: 30px;
    margin-right: 10px;
    fill: darkgray;
  }
</style>
  