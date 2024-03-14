<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])

let images = ref([])

onMounted(async () => {
    const response = await axios.get(`/api/getImagesByProductId/${props.id}`)
    images.value = response.data.images
    console.log(images.value)
})

const deleteImage = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this product?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteProductImage/${id}`)
        console.log(response.data)
        alert('image deleted')
        images.value = images.value.filter((item) => item.id !== id)
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
        <h1>Admin product images {{ images.length }}</h1>
        <table v-if="images.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Category</th>
                    <!-- <th>shop</th> -->
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in images" :key="item.id">
                    <td>{{ item.order }}</td>
                    <td>{{ item.product.name }}</td>
                    <!-- <td>{{ item.shop.name }}</td> -->
                    <td>
                        <img :src="`/storage/${item.path}`" width="100" />
                    </td>
                    <td>
                        <!-- <RouterLink :to="{ name: 'admin.product.edit', params: { id: item.id } }">
                            <button>Edit</button>
                        </RouterLink> -->
                        <button @click="deleteImage(item.id)">Delete</button>
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
