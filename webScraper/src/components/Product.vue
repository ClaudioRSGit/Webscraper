<template>
    <div class="product text-center">
      <div class="position-relative mb-3">
        <div class="badge text-white bg-"></div>
            <!-- <router-link :to="{ name: 'productDetails', params: { id: product.id } }">
            </router-link> -->
            <a :href="`/product/${product.id}`" class="d-block">
              <img class="img-fluid w-100" :src="product.image[0].link" alt="Product Image">
            </a>
      </div>
      <h6>{{ product.title }}</h6>
      <!-- <p class="small text-danger fw-bold">{{ product.product_market_prices[0].price }} {{ product.product_market_prices[0].currency }}</p> -->
      <p class="small text-danger fw-bold">{{ product.lowestPrice }} {{ product.product_market_prices[0].currency }}</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { useRouter } from 'vue-router'

const router = useRouter();
const props = defineProps({
  product: Object,
});


</script>

<style scoped>

</style>

