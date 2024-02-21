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
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin News {{ news.length }}</h1>
        <button>Create</button>
        <table v-if="news.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in news" :key="item.id">
                    <td>{{ item.title }}</td>
                    <td>{{ item.news_category.name }}</td>
                    <td>{{ item.user.name }}</td>
                    <td>{{ item.updated_at }}</td>
                    <td><button>Edit</button><button>Delete</button></td>
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

th, td {
    border: 1px solid black;
    text-align: center;
    width: 20%;
}
</style>
