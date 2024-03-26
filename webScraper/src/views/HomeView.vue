<template>
    <div class="container">
      <Hero />
        <section class="py-5 bg-gold my-4 border rounded-container">
          <div class="container">
            <h1 class="text-center"> As nossas recomendações</h1>
              <div class="d-flex justify-content-center gap-5 mt-4">
                <div class="category-item">
                  <img src="https://www.worten.pt/i/3d1195e1a358f072b0bf79753da5788fac0e0220">
                  <span class="recommendedv-item-title text-center">Novos Produtos</span>
                </div>
                <div class="category-item">
                  <img src="https://www.worten.pt/i/13a9f2051f9b002427d7c55e536534f5747ccc7f">
                  <span class="recommendedv-item-title text-center">Mais vistos</span>
                </div>
                <div class="category-item">
                  <img src="https://www.worten.pt/i/3d1195e1a358f072b0bf79753da5788fac0e0220">
                  <span class="recommendedv-item-title text-center">Mais Vendidos</span>
                </div>
                <div class="category-item">
                  <img src="https://www.worten.pt/i/13a9f2051f9b002427d7c55e536534f5747ccc7f">
                  <span class="recommendedv-item-title text-center">Melhor Preço</span>
                </div>
              </div>
          </div>
        </section>
        <header class="text-center mt-5">
          <h2 class="text-uppercase">Categorias</h2>
        </header>
      <Categories />
          <div class="row">
            <header class="text-center">
              <h2 class="text-uppercase mb-4">Top Produtos da semana</h2>
              <p class="small text-muted small text-uppercase mb-5">Escolha já o seu!</p>
            </header>
            <ProductGrid />
          </div>
          <Services />
          <section class="py-5 bg-gold mb-4">
          <div class="container text-white">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1 ">Free shipping</h6>
                      <p class="text-sm mb-0 text-dark">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-dark">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-dark">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
</template>

<script setup>
import Hero from '@/components/Hero.vue'
import Categories from '@/components/Categories.vue'
import ProductGrid from '@/components/ProductGrid.vue'
import Services from '@/components/Services.vue'
import Footer from '@/components/Footer.vue'
</script>

<style scoped>
@import url('../assets/style.default.css');
.rounded-container{
  border-radius: 50px!important;
}
svg{
  position: relative;
  bottom: 20px;
}
.bg-gold{
  background-color: rgba(218, 165, 32, 0.9);
}
.recommended-item {
  position: relative;
  color: goldenrod;
  transition: all 0.3s;
}

.recommended-item img {
  transition: all 0.3s;
}

.recommendedv-item-title {
  border-radius: 5%;
  display: inline-block;
  padding: 0.5rem 1rem;
  background: #dadbdb;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.07);
  font-size: 0.8rem;
  font-weight: 900;
}

.recommended-item:hover img {
  opacity: 0.7;
}
</style>