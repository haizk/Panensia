<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

// let shops = ref([])
let product_categories = ref([])
let name = ref('')
let desc = ref('')
let ingredient = ref('')
let caution = ref('')
let price = ref('')
let product_category_id = ref('')
// let shop_id = ref('')
let link_shopee = ref('')
let link_tokped = ref('')
let link_tiktok = ref('')
let files = ref(null)
const router = useRouter()

onMounted(async () => {
    const response = await axios.get('/api/getProductCategories')
    product_categories.value = response.data.categories
    console.log(product_categories)
})

const createProduct = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    formData.append('name', name.value)
    formData.append('desc', desc.value)
    formData.append('ingredient', ingredient.value)
    formData.append('caution', caution.value)
    formData.append('price', price.value)
    // formData.append('shop_id', shop_id.value)
    formData.append('product_category_id', product_category_id.value)
    formData.append('link_tokped', link_tokped.value)
    formData.append('link_shopee', link_shopee.value)
    formData.append('link_tiktok', link_tiktok.value)

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
        <p>price</p>
        <input type="number" v-model="price" />
        <p>desc</p>
        <textarea v-model="desc"></textarea>
        <p>ingredient</p>
        <textarea v-model="ingredient"></textarea>
        <p>caution</p>
        <textarea v-model="caution"></textarea>
        <p>category</p>
        <select v-if="product_categories.length > 0" v-model="product_category_id">
            <option v-for="item in product_categories" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No category</p>
        <!-- <p>Shop</p>
        <select v-if="shops.length > 0" v-model="shop_id">
            <option v-for="item in shops" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No Shop</p> -->
        <p>files</p>
        <input type="file" multiple @change="files = $event.target.files" />
        <p>link_shopee</p>
        <input type="text" v-model="link_shopee" />
        <p>link_tokped</p>
        <input type="text" v-model="link_tokped" />
        <p>link_tiktok</p>
        <input type="text" v-model="link_tiktok" />
        <button @click="createProduct()">Create</button>
    </main>
    <AdminFooterComp />
</template>
