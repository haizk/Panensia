<script setup>
// import { useRoute } from 'vue-router'
// import { ref } from 'vue'
// console.log("NewsDetailView")
</script>

<template>
    <div class="container">
        <h1>News Detail</h1>
        <p>News ID: {{ id }}</p>
    </div>
</template>

<script>
export default {
    props: ['id']
}
</script>
