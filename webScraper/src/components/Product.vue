<template>
    <div class="product text-center">
      <div class="position-relative mb-3">
        <div class="badge text-white bg-"></div>
            <!-- <router-link :to="{ name: 'productDetails', params: { id: product.id } }">
            </router-link> -->
            <a :href="`/product/${product.id}`" class="d-block">
              <img class="img-fluid w-100" :src="product.image[0].link" alt="Product Image">
            </a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline d-flex gap-2">
                <li class="list-inline-item m-0 p-0"><i class="far fa-heart"></i></li>
              </ul>
            </div>
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

a{
  text-decoration: none;
  color: black;
}
i{
  color: red;
  cursor: pointer;
}
img{
  object-fit:contain;  
  transition: 0.4s;
  cursor: pointer;
}
.market-logo{
  width: 100px;
  height: 50px;
}
.bg-reden{
  background-color: red;
}
.text-reden, .nav-link{
  color: red;
}
.tag{
    border: 1px solid #000;
    padding: 5px;
    background-color: red;
    color: #FFF;
}
.product img {
  filter: grayscale(40%);
  transition: all 0.3s;
}

.product-overlay {
  width: 100%;
  position: absolute;
  left: 100px;
  top: 0;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding: 1rem 0;
  opacity: 0;
  transition: all 0.3s;
}

.product-overlay ul li {
  transition: all 0.3s;
}

.product-overlay ul li:first-of-type {
  transform: translateX(-10px);
  opacity: 0;
}

.product-overlay ul li:last-of-type {
  transform: translateX(10px);
  opacity: 0;
}

.product:hover img {
  opacity: 0.7;
}

.product:hover .product-overlay {
  opacity: 1;
}

.product:hover .product-overlay li {
  opacity: 1;
  transform: none;
}

.product .badge {
  position: absolute;
  top: 1rem;
  right: 1rem;
  z-index: 1;
}
</style>

