<template>
    <div class="container">
      <Hero />
      <Categories />
          <div class="row">
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