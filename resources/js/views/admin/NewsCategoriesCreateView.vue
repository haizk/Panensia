<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let name = ref('')
const router = useRouter()

const createCategory = async () => {
    // Add validation / CSRF token

    let slug = name.value
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '')

    const newsData = {
        name: name.value,
        slug: slug,
        user_id: 1 // Hardcoded for now
    }

    try {
        const response = await axios.post('/api/createNewsCategory', newsData)
        console.log(response.data)
        alert('News category created')
        router.push('/admin/news_categories')
    } catch (error) {
        console.error(error)
        alert('Error creating news category')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Create News Category</h1>
        <p>name</p>
        <input type="text" v-model="name" />
        <button @click="createCategory()">Create</button>
    </main>
    <AdminFooterComp />
</template>
