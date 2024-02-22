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
let files = ref(null)
const router = useRouter()

onMounted(async () => {
    const response = await axios.get('/api/getNewsCategories')
    news_categories.value = response.data.categories
    console.log(news_categories)
})

const createNews = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    formData.append('title', title.value)
    formData.append('content', content.value)
    formData.append('news_category_id', news_category_id.value)
    formData.append('user_id', 1) // Hardcoded for now

    if (files.value) {
        for (let i = 0; i < files.value.length; i++) {
            formData.append(`files[${i}]`, files.value[i])
        }
    }

    try {
        const response = await axios.post('/api/createNews', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        console.log(response.data)
        alert('News created')
        router.push('/admin/news')
    } catch (error) {
        console.error(error.response.data)
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
        <p>files</p>
        <input type="file" multiple @change="files = $event.target.files" />
        <button @click="createNews()">Create</button>
    </main>
    <AdminFooterComp />
</template>
