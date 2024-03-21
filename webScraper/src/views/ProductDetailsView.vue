<template>
    <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                  <div class="swiper product-slider-thumbs">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></div>
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></div>
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></div>
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                      <img class="img-fluid w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="...">
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                <h1 v-if="product && product.title">{{ product.title }}</h1>
                <span class="py-2 mb-1 text-muted">
                    <strong class="text-dark">Category:</strong>
                    <a class="reset-anchor ms-2" href="#!">Demo Products</a>
                </span>
                <span class="px-3 py-2 mb-3 mb-1 text-muted ">
                    <strong class="text-dark ">Tags:</strong>
                    <a class="reset-anchor ms-2 tag" href="#!">Innovation</a>
                    <a class="reset-anchor ms-2 tag" href="#!">Innovation</a>
                </span>
              <ul class="list-inline mb-2 mt-3 text-sm">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <p class="text-sm mb-4" v-if="product && product.description">{{ product.description }}</p>
              <a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
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
    
        <!-- product market prices-->
        <div class="container">
            <h1>Mercados</h1>
    <div class="card my-4 py-4" v-if="product && product.product_market_prices && product.product_market_prices.length > 0">
        <div v-for="(marketPrice, index) in product.product_market_prices" :key="index">
            <!-- Exibir o nome do mercado -->
            <img v-if="marketPrice.link" :src="marketPrice.link"></img>
            <h1>{{ marketPrice.market.name }}</h1>
            <h2>{{ marketPrice.link }}</h2>

            <h2 v-if="marketPrice.market">{{ marketPrice.market.name }}</h2>
            <!-- Exibir o preço do mercado -->
            <p v-if="marketPrice.price">{{ marketPrice.price }}</p>
            <!-- Botão para redirecionar para o link fornecido pelo preço do mercado -->
            <a :href="marketPrice.link" class="btn btn-primary" target="_blank">Comprar</a>
        </div>
    </div>
          <!--Price histories-->
          <h1>Historico de Preços</h1>
          <div class="container-fluid my-3">
            <canvas id="myChart"></canvas>
            </div>
          <!--Price histories-->
          </div>
        <!-- product market prices-->

          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline d-flex gap-2">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
                <p class="small text-muted">$351</p>
              </div>
            </div>
            <!-- PRODUCT-->
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline d-flex gap-2">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
                <p class="small text-muted">$351</p>
              </div>
            </div>
            <!-- PRODUCT-->
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline d-flex gap-2">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
                <p class="small text-muted">$351</p>
              </div>
            </div>
            <!-- PRODUCT-->
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="https://www.auchan.pt/dw/image/v2/BFRC_PRD/on/demandware.static/-/Sites-auchan-pt-master-catalog/default/dw92cd1ceb/images/hi-res/003263929.jpg?sw=250&sh=250&sm=fit&bgcolor=FFFFFF" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline d-flex gap-2">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
                <p class="small text-muted">$351</p>
              </div>
            </div>
          </div>
        </div>
      </section>
</template>

<script>
import { getProductsById} from '../services/http';

export default {
  mounted() {
    this.fetchProductById();
    this.loadChartJS().then(() => {
      const data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'Sales',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
          data: [65, 59, 80, 81, 56, 55, 40],
        }],
      };

      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart = new Chart(document.getElementById('myChart'), config);
    });
  },
  methods: {
    async fetchProductById() {
      try {
        const productId = this.$route.params.id;
        const product = await getProductsById(productId);
        this.product = product;
        console.log('Retrieved product:', product);
      } catch (error) {
        console.error('Error fetching product by ID:', error);
      }
    },
    loadChartJS() {
      return new Promise((resolve, reject) => {
        if (window.Chart) {
          resolve();
        } else {
          const script = document.createElement('script');
          script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
          script.async = true;
          script.onload = resolve;
          script.onerror = reject;
          document.head.appendChild(script);
        }
      });
    }
  },
  created() {
    this.productId = this.$route.params.id;
    this.fetchProductById();
  }
}
</script>

<style scoped>
.tag{
    border: 1px solid #000;
    padding: 5px;
    background-color: darkgray;
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