<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let news_categories = ref([])

onMounted(async () => {
    const response = await axios.get('/api/getNewsCategories')
    news_categories.value = response.data.categories
    console.log(news_categories.value)
})

const deleteCategory = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this category?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteNewsCategory/${id}`)
        console.log(response.data)
        alert('Category deleted')
        news_categories.value = news_categories.value.filter((item) => item.id !== id)
    } catch (error) {
        console.error(error)
        alert('Error deleting category')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin News Categories {{ news_categories.length }}</h1>
        <RouterLink to="/admin/news_categories/create">
            <button>Create</button>
        </RouterLink>
        <table v-if="news_categories.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in news_categories" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.updated_at }}</td>
                    <td>
                        <RouterLink
                            :to="{ name: 'admin.news_categories.edit', params: { id: item.id } }"
                        >
                            <button>Edit</button>
                        </RouterLink>
                        <button @click="deleteCategory(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <AdminFooterComp />
</template>

<style scoped>
table {
    border-collapse: collapse;
}

th,
td {
    border: 1px solid black;
    text-align: center;
    width: 33%;
}
</style>
