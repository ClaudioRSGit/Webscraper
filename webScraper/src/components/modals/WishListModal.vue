<template>
  <div class="modal">
    <div class="modal-content">
      <select v-model="selectedList">
        <option v-for="list in favoriteLists" :key="list.id" :value="list.id">{{ list.name }}</option>
      </select>
      <button @click="save">Guardar</button>
    </div>
  </div>
</template>

<script>
import { getAllFavoriteLists, createFavoriteList } from '@/services/http'

export const showModal = () => {
  appContext.emit('show-wishlist-modal');
};

export default {
  name: 'WishListModal',
  data() {
    return {
      favoriteLists: [],
      selectedList: null
    };
  },
  mounted() {
    this.fetchFavoriteLists();
  },
  methods: {
    async fetchFavoriteLists() {
      try {
        this.favoriteLists = await getAllFavoriteLists();
      } catch (error) {
        console.error(error);
      }
    },
    async save() {
      try {
        await createFavoriteList({ listId: this.selectedList });
      } catch (error) {
        console.error(error);
      }
    }
  }
};
</script>

<style scoped>
</style>
