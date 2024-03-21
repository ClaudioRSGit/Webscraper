<template>
    <div class="card mb-4 mt-3">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5 class="fw-bold">Markets</h5>
                <button type="button" class="btn btn-primary" @click="showModal">Add Market</button>
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
                        <tr v-for="market in markets" :key="market.id" v-if="markets.length > 0">
                          <div class="d-flex px-2 py-1">
                            <img :src="market.logo" class="avatar avatar-sm me-3 mt-1">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="fw-bold text-dark mb-0 text-sm">#{{ market.id }}</span>
                              <h5 class="text-xs text-secondary mb-0">{{ market.name }}</h5>
                            </div>
                          </div>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <div class="d-flex justify-content-around">
                                  <i class="fas fa-edit" @click.prevent="editMarket(market.id)"></i>
                                  <i class="fas fa-trash" @click.prevent="destroyMarket(market.id)"></i>
                                </div>
                            </a>
                        </td>
                        </tr>
                        <tr v-else>
                            <span class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No markets to show</span>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
      </div>
      <div class="modal fade" id="marketModal" tabindex="-1" aria-labelledby="marketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="marketModalLabel">Market Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="submitMarket" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input class="form-control" type="text" v-model="name" id="name" name="name" placeholder="Insert name" required>
                </div>
                <div class="mb-3">
                  <label for="logo" class="form-label">Logo URL</label>
                  <input class="form-control" type="text" v-model="logo" id="logo" name="logo" placeholder="Insert logo URL" required>
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
  import { getMarkets, deleteMarket, createMarket, updateMarket } from '@/services/http.js';
  
  export default {
    setup() {
      const markets = ref([]);
      const name = ref('');
      const logo = ref('');
      const errors = ref([]);
      const marketIdToEdit = ref(null);

      const fetchMarkets = async () => {
        try {
          markets.value = await getMarkets();
        } catch (error) {
          console.error(error);
        }
      };
  
      const destroyMarket = async (id) => {
        try {
          await deleteMarket(id);
          fetchMarkets();
        } catch (error) {
          console.error(error);
        }
      };
  
      const submitMarket = async () => {
        errors.value = [];
        if (name.value && logo.value) {
          try {
            if (marketIdToEdit.value) {
              await updateMarket(marketIdToEdit.value, { 
                name: name.value,
                logo: logo.value
              });
              $('#marketModal').modal('hide');
              cleanForm();
              fetchMarkets();
            } 
            else {
              await createMarket({ 
                name: name.value,
                logo: logo.value
              });
              $('#marketModal').modal('hide');
              cleanForm();
              fetchMarkets();
            }
          } catch (error) {
            console.error(error);
          }
        } else {
          errors.value.push('Name is required');
        }
      };

      const editMarket = async (id) => {
        try {
          marketIdToEdit.value = id;
          const market = markets.value.find(market => market.id === id);
              if (market) {
                name.value = market.name;
                logo.value = market.logo;
              }

          $('#marketModal').modal('show');
        } catch (error) {
          console.error(error);
        }
      };
      
      const cleanForm = () => {
        name.value = '';
        logo.value = '';
      };

      const showModal = () => {
        cleanForm();
        $('#marketModal').modal('show');
      };
      onMounted(fetchMarkets);
  
      return {
        markets,
        name,
        logo,
        errors,
        destroyMarket,
        showModal,
        submitMarket,
        getMarkets,
        deleteMarket,
        createMarket,
        updateMarket,
        editMarket,
        cleanForm
      };
    }
  };
  </script>
  
  <style scoped>
  @import url("../assets/table.css");
  img{
    object-fit:contain;
  }
  </style>
  