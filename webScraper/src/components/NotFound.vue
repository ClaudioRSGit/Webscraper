<template>
    <div class="not-found">
        <img src="https://media.istockphoto.com/id/804405616/vector/unplug.jpg?s=612x612&w=0&k=20&c=IwTieCGXxyzc1_bEmf2FMp9FxIP1eMoJ_qSupL7B5vg=" alt="" style="height: 200px;">
        <h1>404</h1>
        <p>Oops! Parece que alguém se perdeu!</p>
        <router-link to="/">Voltar</router-link>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    // Add any necessary props here
});
</script>

<style scoped>
.not-found {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;

    h1 {
        font-size: 6rem;
        margin-bottom: 2rem;
    }

    p {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    router-link {
        color: #007bff;
        text-decoration: underline;
        cursor: pointer;
    }
}
</style>