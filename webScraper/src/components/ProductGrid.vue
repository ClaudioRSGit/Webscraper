<template>
  <div class="container">
    <h1></h1>
  <div v-if="products.length > 0">
    <div class="d-flex container px-5 gap-2">
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="product text-center">
            <div class="position-relative mb-3">
              <div class="badge text-white bg-">
              </div>
              <a class="d-block">
                <img :src="products[0].image[0].link" alt="" class="img-fluid card-image shadow-1-strong rounded bg-white">
              </a>
                <div class="product-overlay">
                  <ul class="mb-0 list-inline d-flex gap-2">
                    <li class="list-inline-item m-0 p-0"><i class="far fa-heart"></i></li>
                  </ul>
                </div>
              </div>
              <h6> <a class="reset-anchor">{{ products[0].title }}</a></h6>
              <p class="small text-danger fw-bold">{{ products[0].product_market_prices[0].price }} {{ products[0].product_market_prices[0].currency }}</p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="product text-center">
              <div class="position-relative mb-3">
                <div class="badge text-white bg-"></div>
                <a class="d-block"><img :src="products[1].image[0].link" alt="" class="img-fluid card-image shadow-1-strong rounded bg-white"></a>
                <div class="product-overlay">
                  <ul class="mb-0 list-inline d-flex gap-2">
                    <li class="list-inline-item m-0 p-0"><i class="far fa-heart"></i></li>
                  </ul>
                </div>
              </div>
            <h6> <a class="reset-anchor">{{ products[1].title }}</a></h6>
            <p class="small text-danger fw-bold">{{ products[1].product_market_prices[0].price }} {{ products[1].product_market_prices[0].currency }}</p>
      </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-sm-6">
      <div class="product text-center">
        <div class="position-relative mb-3">
          <div class="badge text-white card">
          </div>
          <a class="d-block">
            <img :src="products[2].image[0].link" alt="" class="img-fluid card-image shadow-1-strong rounded bg-white">
          </a>
                <div class="product-overlay">
                  <ul class="mb-0 list-inline d-flex gap-2">
                    <li class="list-inline-item m-0 p-0"><i class="far fa-heart"></i></li>
                  </ul>
                </div>
        </div>
        <h6> <a class="reset-anchor">{{ products[2].title }}</a></h6>
        <p class="small text-danger fw-bold">{{ products[2].product_market_prices[0].price }} {{ products[2].product_market_prices[0].currency }}</p>
      </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-sm-6">
      <div class="product text-center">
        <div class="position-relative mb-3">
          <div class="badge text-white bg-">
          </div>
          <a class="d-block">
            <img :src="products[3].image[0].link" alt="" class="img-fluid card-image shadow-1-strong rounded bg-white">
          </a>
          <div class="product-overlay">
                  <ul class="mb-0 list-inline d-flex gap-2">
                    <li class="list-inline-item m-0 p-0"><i class="far fa-heart"></i></li>
                  </ul>
                </div>
        </div>
        <h6> <a class="reset-anchor">{{ products[3].title }}</a></h6>
        <p class="small text-danger fw-bold">{{ products[3].product_market_prices[0].price }} {{ products[3].product_market_prices[0].currency }}</p>
      </div>
    </div>
  </div>
    </div>
    <div v-else class="text-center">
      <img src="https://user-images.githubusercontent.com/85354530/157868037-0f50e466-62c6-4c2c-8fee-fc5b96627b63.gif">
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { getProducts } from '@/services/http';

export default {
  name: 'ProductGrid',
  setup() {
    const products = ref([]);
    
    async function fetchProducts() {
      try {
        const allProducts = await getProducts();
        const shuffledProducts = shuffle(allProducts).filter(product => product.isActive === 1);
        products.value = shuffledProducts.slice(0, 4);
        
      } catch (error) {
        console.error(error);
      }
    }

    function shuffle(array) {
      let currentIndex = array.length,
        randomIndex;
      while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;
        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex],
          array[currentIndex]
        ];
      }
      return array;
    }

    onMounted(fetchProducts);

    return {
      products
    };
  }
};
</script>


<style scoped>
img{
  min-height: 280px;
  min-width: 260px;
  max-width: 260px!important;
  max-height: 280px!important;
  box-shadow: 0 0 5px rgba(33, 33, 33, 0.2);
  object-fit:contain;  
  border-radius: 10px;
  transition: 0.4s;
  cursor: pointer;
}
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
