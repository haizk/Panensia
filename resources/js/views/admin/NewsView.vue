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
        <RouterLink to="/admin/news/create">
            <button>Create</button>
        </RouterLink>
        <table v-if="news.length > 0" width="100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="80%">Title</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in news" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td style="text-align: left; padding-left: 10px">{{ item.title }}</td>
                    <td>
                        <RouterLink :to="{ name: 'admin.news.edit', params: { id: item.id } }">
                            <button>Edit</button>
                        </RouterLink>
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
}
</style>
