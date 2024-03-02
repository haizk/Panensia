<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let shops = ref([])
let name = ref('')
let desc = ref('')
let shop_id = ref('')
let link_shopee = ref('')
let link_tokped = ref('')
let files = ref(null)
const router = useRouter()

onMounted(async () => {
    const response = await axios.get('/api/getShops')
    shops.value = response.data.shops
    console.log(shops)
})

const createProduct = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    formData.append('name', name.value)
    formData.append('desc', desc.value)
    formData.append('shop_id', shop_id.value)
    formData.append('link_tokped', link_tokped.value)
    formData.append('link_shopee', link_shopee.value)

    if (files.value) {
        for (let i = 0; i < files.value.length; i++) {
            formData.append(`files[${i}]`, files.value[i])
        }
    }

    try {
        const response = await axios.post('/api/createProduct', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        console.log(response.data)
        alert('Product created')
        router.push('/admin/products')
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
        <p>name</p>
        <input type="text" v-model="name" />
        <p>desc</p>
        <textarea v-model="desc"></textarea>
        <p>Shop</p>
        <select v-if="shops.length > 0" v-model="shop_id">
            <option v-for="item in shops" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No Shop</p>
        <p>files</p>
        <input type="file" multiple @change="files = $event.target.files" />
        <p>link_shopee</p>
        <input type="text" v-model="link_shopee" />
        <p>link_tokped</p>
        <input type="text" v-model="link_tokped" />
        <button @click="createProduct()">Create</button>
    </main>
    <AdminFooterComp />
</template>
