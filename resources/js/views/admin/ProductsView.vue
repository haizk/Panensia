<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let products = ref([])

onMounted(async () => {
    const response = await axios.get('/api/getProducts')
    products.value = response.data.products
    console.log(products.value)
})

const deleteProduct = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this product?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteProduct/${id}`)
        console.log(response.data)
        alert('product deleted')
        products.value = products.value.filter((item) => item.id !== id)
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
        <h1>Admin product {{ products.length }}</h1>
        <RouterLink to="/admin/product/create">
            <button>Create</button>
        </RouterLink>
        <table v-if="products.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>shop</th>
                    <th>Images</th>
                    <th>Link_Tokped</th>
                    <th>Link_Shopee</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in products" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.shop.name }}</td>
                    <td>
                        <span v-for="image in item.image" :key="image.id">
                            {{ image.path }}
                            <img :src="`/storage/${image.path}`" width="100" />
                        </span>
                    </td>
                    <td>{{ item.link_tokped }}</td>
                    <td>{{ item.link_shopee }}</td>
                    <td>{{ item.updated_at }}</td>
                    <td>
                        <RouterLink :to="{ name: 'admin.product.edit', params: { id: item.id } }">
                            <button>Edit</button>
                        </RouterLink>
                        <button @click="deleteProduct(item.id)">Delete</button>
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
