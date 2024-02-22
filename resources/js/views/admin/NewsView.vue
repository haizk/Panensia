<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let news = ref([])

onMounted(async () => {
    const response = await axios.get('/api/getNews')
    news.value = response.data.news
    console.log(news.value)
})

const deleteNews = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this news?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteNews/${id}`)
        console.log(response.data)
        alert('News deleted')
        news.value = news.value.filter((item) => item.id !== id)
    } catch (error) {
        console.error(error)
        alert(error.response.data.message)
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin News {{ news.length }}</h1>
        <RouterLink to="/admin/news/create">
            <button>Create</button>
        </RouterLink>
        <table v-if="news.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Images</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in news" :key="item.id">
                    <td>{{ item.title }}</td>
                    <td>{{ item.news_category.name }}</td>
                    <td>{{ item.user.name }}</td>
                    <td>
                        <span v-for="image in item.news_images" :key="image.id">
                            {{ image.path }}
                            <img :src="`/storage/${image.path}`" width="100" />
                        </span>
                    </td>
                    <td>{{ item.updated_at }}</td>
                    <td>
                        <RouterLink :to="{ name: 'admin.news.edit', params: { id: item.id } }">
                            <button>Edit</button>
                        </RouterLink>
                        <button @click="deleteNews(item.id)">Delete</button>
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
    width: 16%;
}
</style>
