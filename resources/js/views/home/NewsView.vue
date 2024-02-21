<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

let news = ref([])

onMounted(async () => {
    const response = await axios.get('/api/getNews')
    news.value = response.data.news
    console.log(news.value)
})
</script>

<template>
    <div>
        <h1>News {{ news.length }}</h1>
        <ul v-if="news.length > 0">
            <li v-for="item in news" :key="item.id">
                <RouterLink :to="{ name: 'news.detail', params: { id: item.id } }">
                    <h2>{{ item.title }}</h2>
                </RouterLink>
                <template v-for="image in item.news_images" :key="image.id">
                    <img
                        v-if="image.order === 1"
                        :src="image.path"
                        :alt="image.alt"
                        width="100"
                    /><br v-if="image.order === 1" />
                </template>
                <small>{{ item.news_category.name }}</small>
                <p>{{ item.content }}</p>
                <p>{{ item.user.name }}</p>
                <small>{{ item.created_at }}</small>
            </li>
        </ul>
        <p v-else>No news found</p>
    </div>
</template>
