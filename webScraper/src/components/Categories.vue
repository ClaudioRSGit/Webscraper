<template>
  <div class="pt-5">
    <header class="text-center">
      <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
      <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>

    <div class="row" v-if="categories.length > 0">
      <div class="container px-5">
        <div class="row mx-5 img-container">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <a class="category-item">
              <img :src="categories[0] ? categories[0].link : 'https://via.placeholder.com/350x150'"
                class="w-100 shadow-1-strong rounded mb-4 bg-white card-img sm-height img-fluid"/>
              <span class="category-item-title">{{ categories[0] ? categories[0].description : 'Imagem indisponivel' }}</span>
            </a>
            <a class="category-item">
              <img
              :src="categories[1] ? categories[1].link : 'https://via.placeholder.com/350x150'"
              class="w-100 shadow-1-strong rounded mb-4 bg-white card-img big-img img-fluid"/>
              <span class="category-item-title">{{ categories[1] ? categories[1].description : 'Imagem indisponivel' }}</span>
            </a>
          </div>
          
          <div class="col-lg-4 mb-4 mb-lg-0">
            <a class="category-item">
              <img
              :src="categories[2] ? categories[2].link : 'https://via.placeholder.com/350x150'"
                class="w-100 shadow-1-strong rounded mb-4  bg-white card-img big-img img-fluid"/>
              <span class="category-item-title">{{ categories[2] ? categories[2].description : 'Imagem indisponivel' }}</span>
            </a>
            <a class="category-item">
            <img
              :src="categories[3] ? categories[3].link : 'https://via.placeholder.com/350x150'"
              class="w-100 shadow-1-strong rounded mb-4 bg-white card-img sm-height img-fluid"/>
              <span class="category-item-title">{{ categories[3] ? categories[3].description : 'Imagem indisponivel' }}</span>
            </a>
          </div>
          
          <div class="col-lg-4 mb-4 mb-lg-0">
            <a class="category-item">
            <img
            :src="categories[4] ? categories[4].link : 'https://via.placeholder.com/350x150'"
            class="w-100 shadow-1-strong rounded mb-4 bg-white card-img sm-height img-fluid"/>
            <span class="category-item-title">{{ categories[4] ? categories[4].description : 'Imagem indisponivel' }}</span>
          </a>
            <a class="category-item">
              <img
              :src="categories[5] ? categories[5].link : 'https://via.placeholder.com/350x150'"
              class="w-100 shadow-1-strong rounded mb-4 bg-white card-img big-img img-fluid"/>
              <span class="category-item-title">{{ categories[5] ? categories[5].description : 'Imagem indisponivel' }}</span>
            </a>
            </div>
        </div>
      </div>
    </div>
    <div v-else class="text-center">
      <img src="https://user-images.githubusercontent.com/85354530/157868037-0f50e466-62c6-4c2c-8fee-fc5b96627b63.gif">
    </div>
  </header>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { getCategories } from '@/services/http.js';

const categories = ref([]);

async function categoryGallery() {
  try {
    const allCategories = await getCategories();

    const shuffledCategories = shuffle(allCategories);    

    categories.value = shuffledCategories.slice(0, 6);
  } catch (error) {
    console.log(error);
  }
}
function shuffle(array) {
  let currentIndex = array.length, randomIndex;
  while (currentIndex !== 0) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
    }
    return array;
  }

onMounted(categoryGallery);
</script>

<style scoped>
.img-container {
  display: flex;
  flex-wrap: wrap;
}
img{
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  object-fit:contain;
}
.sm-height {
  height: 30%;
}
.big-img {
  height: 45%;
}
.img-container{
  max-height: 100%;
}
.category-item {
  position: relative;
  color: #343a40;
  transition: all 0.3s;
}

.category-item img {
  transition: all 0.3s;
}

.category-item-title {
  display: inline-block;
  padding: 0.5rem 1rem;
  background: #dadbdbd2;
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

.category-item:hover img {
  opacity: 0.7;
}
</style>