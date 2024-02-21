<script setup>
import { useRouter } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])
let news_categories = ref([])
let news = ref(null)
let title = ref('')
let content = ref('')
let news_category_id = ref('')
const router = useRouter()

onMounted(async () => {
    const newsResponse = await axios.get(`/api/getNewsById/${props.id}`)
    news.value = newsResponse.data.news
    console.log(news.value)

    const categoriesResponse = await axios.get('/api/getNewsCategories')
    news_categories.value = categoriesResponse.data.categories
    console.log(news_categories)

    if (!news.value) {
        router.push({ name: 'news' })
    }
})

const editNews = async () => {
    // Add validation / CSRF token

    const newsData = {
        title: title.value,
        content: content.value,
        news_category_id: news_category_id.value,
        user_id: 1 // Hardcoded for now
    }

    try {
        const response = await axios.post(`/api/editNews/${props.id}`, newsData)
        console.log(response.data)
        alert('News edited')
        router.push('/admin/news')
    } catch (error) {
        console.error(error)
        alert('Error editing news')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Edit News</h1>
        <p>title</p>
        <input type="text" v-model="title" />
        <p>content</p>
        <textarea v-model="content"></textarea>
        <p>category</p>
        <select v-if="news_categories.length > 0" v-model="news_category_id">
            <option v-for="item in news_categories" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No category</p>
        <button @click="editNews()">Create</button>
    </main>
    <AdminFooterComp />
</template>
