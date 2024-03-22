<template>
    <div class="container">
      <Hero />
      <Categories />
          <div class="row">
            <header class="text-center">
              <h2 class="text-uppercase mb-4">Top Produtos da semana</h2>
              <p class="small text-muted small text-uppercase mb-5">Escolha já o seu!</p>
            </header>
            <ProductGrid />
          </div>
          <Services />
    </div>
</template>

<script setup>
import Hero from '@/components/Hero.vue'
import Categories from '@/components/Categories.vue'
import ProductGrid from '@/components/ProductGrid.vue'
import Services from '@/components/Services.vue'
import Footer from '@/components/Footer.vue'
</script>

<style lang="scss" scoped>

</style>