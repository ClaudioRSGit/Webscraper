<template>
  <div class="card mb-4 mt-3">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5 class="fw-bold">Categories</h5>
                <button type="button" class="btn btn-primary" @click="showModal">Add Category</button>
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
                      <tr v-for="category in categories" :key="category.id">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <img :src="category.link" class="avatar avatar-sm me-3 mt-1">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="fw-bold text-dark mb-0 text-sm">#{{ category.id }}</span>
                              <h5 class="text-xs text-secondary mb-0">{{ category.description }}</h5>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit category">
                                <div class="d-flex justify-content-around">
                                  <i class="fas fa-edit" @click.prevent="editCategory(category.id)"></i>
                                  <i class="fas fa-trash" @click.prevent="destroyCategory(category.id)"></i>
                                </div>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
      </div>
    
    <!-- Modal - passar para componente-->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="categoryModalLabel">Category Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form @submit.prevent="submitCategory" method="post">
            <div class="modal-body">
              <label for="name">Category Name</label>
              <input class="form-control mt-1" type="text" v-model="name" id="name" placeholder="Insert category name">
              <label for="link" class="mt-2">Category Image Link</label>
              <input class="form-control mt-1" type="text" v-model="link" id="link" placeholder="Insert the link">
            </div>
            <div class="alert alert-danger" v-if="errors.length">
              <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
              </ul>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import { getCategories, createCategory, deleteCategory, updateCategory  } from '@/services/http.js';

  export default {
    name: 'CategoryTable',
    setup() {
      const name = ref('');
      const link = ref('');
      const categories = ref([]);
      const errors = ref([]);
      const categoryIdToEdit = ref(null);
  
      const fetchCategories = async () => {
        try {
          categories.value = await getCategories();
        } catch (error) {
          console.error(error);
        }
      };
  
      const submitCategory = async () => {
        errors.value = [];
        if (categoryIdToEdit.value) {
          try {
            await updateCategory(categoryIdToEdit.value, {
              description: name.value,
              link: link.value
            });

            cleanForm();
            $('#categoryModal').modal('hide');
            fetchCategories();
          } catch (error) {
            console.error(error);
          }
        } else {
          if (name.value && link.value) {
            try {
              await createCategory({
                description: name.value,
                link: link.value
              });

              cleanForm();
              $('#categoryModal').modal('hide');
              fetchCategories();
            } catch (error) {
              console.error(error);
            }
          } else {
            if (!name.value) errors.value.push('Name required');
            if (!link.value) errors.value.push('Link required');
          }
      }
    };

    const editCategory = (id) => {
      categoryIdToEdit.value = id;
      const category = categories.value.find(category => category.id === id);
      
      if (category) {
        name.value = category.description;
        link.value = category.link;
      }

      $('#categoryModal').modal('show');
    };
    
    const destroyCategory = async (id) => {
      try {
          await deleteCategory(id);
          fetchCategories();
      } catch (error) {
          console.error(error);
      }
    };
    
      const showModal = () => {
      cleanForm();
      categoryIdToEdit.value = null;
      $('#categoryModal').modal('show');
    };

    const cleanForm = () => {
      name.value = '';
      link.value = '';
    };

    onMounted(fetchCategories);

    return {
      name,
      link,
      categories,
      errors,
      createCategory,
      submitCategory,
      showModal,
      destroyCategory,
      editCategory
    };
  }
  };
  </script>
  
  <style scoped>
@import url("../assets/table.css");
</style>