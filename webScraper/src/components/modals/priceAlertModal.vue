<template>
    <div class="modal fade" id="priceAlertModal" tabindex="-1" aria-labelledby="priceAlertModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="priceAlertModalLabel">Alerta de Preço</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="confirmPrice">
              <div class="mb-3">
                <label for="wantedPriceInput" class="form-label">Insira o preço desejado:</label>
                <input type="number" class="form-control" id="wantedPriceInput" v-model="wantedPrice" required>
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
  </template>
  
  <script>
  import { ref } from 'vue';
  import { getAuthenticatedUser, createPriceNotification } from '@/services/http.js';
  
  export default {
    name: 'priceAlertModal',
    data() {
      return {
        wantedPrice: null
      };
    },
    methods: {
      async confirmPrice() {
        try {
          const authUser = await getAuthenticatedUser();
          const priceNotification = {
            user_id: authUser.id,
            product_id: this.$route.params.id,
            wanted_price: this.wantedPrice
          };
          await createPriceNotification(priceNotification);
          this.$emit('confirm');
          this.wantedPrice = null;
          $('#priceAlertModal').modal('hide');
        } catch (error) {
          console.error(error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  </style>
  