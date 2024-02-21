<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let news_categories = ref([])
let title = ref('')
let content = ref('')
let news_category_id = ref('')
const router = useRouter()

onMounted(async () => {
    const response = await axios.get('/api/getNewsCategories')
    news_categories.value = response.data.categories
    console.log(news_categories)
})

const createNews = async () => {
    // Add validation / CSRF token

    const newsData = {
        title: title.value,
        content: content.value,
        news_category_id: news_category_id.value,
        user_id: 1 // Hardcoded for now
    }

    try {
        const response = await axios.post('/api/createNews', newsData)
        console.log(response.data)
        alert('News created')
        router.push('/admin/news')
    } catch (error) {
        console.error(error)
        alert('Error creating news')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Create News</h1>
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
        <button @click="createNews()">Create</button>
    </main>
    <AdminFooterComp />
</template>
