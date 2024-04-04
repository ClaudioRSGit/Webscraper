<template>
    <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                  <div class="swiper product-slider-thumbs">
                    <div class="swiper-wrapper">
                      <div v-if="product" v-for="(image, index) in product.image" :key="index" class="swiper-slide h-auto swiper-thumb-item mb-3">
                        <img class="w-100" v-if="image.link" :src="image.link" alt="...">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <img class="img-fluid w-100" v-if="product && product.image && product.image.length > 0 && product.image[0].link" :src="product.image[0].link" alt="...">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
                <h1 v-if="product && product.title">{{ product.title }}</h1>
                <span class="py-2 mb-1 text-muted">
                    <strong class="text-dark">Category:</strong>
                    <a class="reset-anchor ms-2">Demo Products</a>
                </span>
                <span class="px-3 py-2 mb-3 mb-1 text-muted ">
                    <strong class="text-dark ">Tags:</strong>
                    <span class="reset-anchor ms-2 tag" >Innovation</span>
                    <span class="reset-anchor ms-2 tag" >Eletronics</span>
                </span>
              <ul class="list-inline mb-2 mt-3 text-sm">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <p class="text-sm mb-4" v-if="product && product.description">{{ product.description }}</p>
              <a class="text-dark p-0 mb-4 d-inline-block"><i class="far fa-heart me-2" @click="openModal"></i>Add to wish list</a><br>
            </div>
          </div>
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descrição</a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase fw-bold">Descrição do Produto</h6>
                <p class="text-muted text-sm mb-0" v-if="product && product.description">{{ product.description }}</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="d-flex mb-3">
                      <div class="flex-shrink-0"><img class="rounded-circle" src="https://img.freepik.com/premium-vector/man-character_665280-46970.jpg" alt="" width="50"/></div>
                      <div class="ms-3 flex-shrink-1">
                        <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-shrink-0"><img class="rounded-circle" src="https://img.freepik.com/premium-vector/man-character_665280-46970.jpg" alt="" width="50"/></div>
                      <div class="ms-3 flex-shrink-1">
                        <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                        <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                        <ul class="list-inline mb-1 text-xs">
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                        </ul>
                        <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        <div class="container">
          <div v-if="product && product.product_market_prices">
            <div class="my-4 py-4">
                <h2>Todas as ofertas</h2>
                <div class="d-flex justify-content-between bg-white my-3 align-items-center p-3" v-for="(marketPrice, index) in product.product_market_prices" :key="index">
                    <img v-if="marketPrice.market && marketPrice.market.logo" :src="marketPrice.market.logo" class="market-logo" alt="Market Logo">
                    <span class="text-sm mb-1" v-if="product && product.title">{{ product.title }}</span>
                  <span class="text-reden fw-bold mb-0" v-if="marketPrice.price">{{ marketPrice.price }} {{ marketPrice.currency }}</span>
                  <a :href="marketPrice.link" class="btn bg-reden text-white ml-auto" target="_blank">Ver Produto</a>
              </div>
              </div>
            </div>
          <h2>Historico de Preços</h2>
          <div>
            <canvas id="myChart" width="400" height="150"></canvas>
          </div>
        </div>

          <div class="row container">
            <h2 class="mb-4">Produtos Relacionados</h2>
            <ProductGrid />
            
          </div>
        </div>
      </section>
      <AddProductToWishListModal :prodID="route.params.id"/>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { getProductsById, getPriceHistoryById  } from '../services/http';
import ProductGrid from '@/components/ProductGrid.vue';
import Chart from 'chart.js/auto';
import AddProductToWishListModal from '@/components/modals/AddProductToWishListModal.vue';

const product = ref(null);
const priceHistory = ref([]);
const route = useRoute();

onMounted(async () => {
  await fetchProductAndPriceHistory();
  renderChart();
});


const openModal = () => {
  $('#chooseWishlistModal').modal('show');
};
const fetchProductAndPriceHistory = async () => {
  try {
    const productId = route.params.id;
    product.value = await getProductsById(productId);

    priceHistory.value = await getPriceHistoryById(productId);
  } catch (error) {
    console.error('Error fetching product and price history:', error);
  }
};

const renderChart = () => {
  const ctx = document.getElementById('myChart');

  const labels = priceHistory.value.map(entry => {
    const date = new Date(entry.collected_at);
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    return `${day}/${month}`;
  });
  const data = priceHistory.value.map(entry => parseFloat(entry.avg_price));

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Preço médio mensal',
            data: data,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
  });
};
</script>

<style scoped>
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
  left: 0;
  bottom: 0;
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