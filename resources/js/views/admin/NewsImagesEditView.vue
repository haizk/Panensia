<script setup>
import { useRouter } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])
let images = ref(null)
const router = useRouter()

onMounted(async () => {
    const response = await axios.get(`/api/getNewsImageByNewsId/${props.id}`)
    images.value = response.data.images
    console.log(images.value.length)

    if (images.value.length === 0) {
        router.push({ name: 'admin.news' })
    }
})

const editImages = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    const orders = images.value.map((item) => item.order)
    let thumbnail = false

    // Check if there are duplicate orders
    const hasDuplicates = orders.some((order, index) => orders.indexOf(order) !== index)
    if (hasDuplicates) {
        alert('Order values must be unique')
        return
    }

    for (let i = 0; i < images.value.length; i++) {
        formData.append(`images[${i}][order]`, images.value[i].order)

        if (images.value[i].order === 1) {
            thumbnail = true
        }

        if (images.value[i].order > images.value.length) {
            alert('Order values must be between 1 and the number of images')
            return
        }
    }

    if (!thumbnail) {
        alert('At least one image must be set as thumbnail (order = 1)')
        return
    }

    try {
        const response = await axios.post(`/api/editNewsImageOrder/${props.id}`, formData)
        console.log(response.data)
        alert('Images edited')
        router.push('/admin/news')
    } catch (error) {
        console.error(error.response.data)
        alert('Error editing images')
    }
}

const deleteNewsImage = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this image?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteNewsImage/${id}`)
        console.log(response.data)
        alert('Image deleted')
        images.value = images.value.filter((item) => item.id !== id)
        if (images.value.length === 0) {
            alert('No more images')
            router.push({ name: 'admin.news' })
        }
    } catch (error) {
        console.error(error.response.data)
        alert('Error deleting image')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Edit Images {{ props.id }}</h1>
        <table v-if="images" width="100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in images" :key="item.id">
                    <td>
                        <img :src="`/storage/${item.path}`" width="100" />
                    </td>
                    <td>
                        <input type="number" v-model="item.order" />
                    </td>
                    <td>
                        <button @click="deleteNewsImage(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="editImages()">Edit</button>
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
