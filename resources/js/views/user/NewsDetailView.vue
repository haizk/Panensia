<script setup>
import { useRouter } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

let props = defineProps(['id'])
let news = ref(null)
let router = useRouter()

onMounted(async () => {
    const response = await axios.get(`/api/getNewsById/${props.id}`)
    news.value = response.data.news
    console.log(news.value)

    if (!news.value) {
        router.push({ name: 'news' })
    }
})
</script>

<template>
    <div>
        <h1>User News Detail</h1>
        <div v-if="news">
            <p>id: {{ news.id }}</p>
            <p>title: {{ news.title }}</p>
            <template v-for="image in news.news_images" :key="image.id">
                <img :src="image.path" :alt="image.alt" width="100" />
            </template>
            <p>content: {{ news.content }}</p>
            <p>category id: {{ news.news_category.id }}</p>
            <p>category: {{ news.news_category.name }}</p>
            <p>user id: {{ news.user.id }}</p>
            <p>user: {{ news.user.name }}</p>
            <p>created_at: {{ news.created_at }}</p>
            <p>updated_at: {{ news.updated_at }}</p>
        </div>
    </div>
</template>
