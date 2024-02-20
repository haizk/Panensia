<script setup>
import { RouterLink } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

let news = ref([])

onMounted(async () => {
    const response = await axios.get('/api/getNews')
    news.value = response.data.news
})
</script>

<template>
    <div>
        <h1>News {{ news.length }}</h1>
        <ul v-if="news.length > 0">
            <li v-for="item in news" :key="item.id">
                <RouterLink :to="{ name: 'news.detail', params: { id: item.id } }">
                    {{ item.title }}
                </RouterLink>
                <a :href="`/news/${item.id}`">{{ item.title }}</a>
                <small>{{ item.news_category_id }}</small>
                <p>{{ item.content }}</p>
                <p>{{ item.user_id }}</p>
                <small>{{ item.created_at }}</small>
            </li>
        </ul>
        <p v-else>No news found</p>
    </div>
</template>
