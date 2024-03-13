<script setup>
import { useRouter } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])
let product_categories = ref([])
// let shops = ref([])
let product = ref(null)
let files = ref(null)
let name = ref('')
let link_shopee = ref('')
let link_tokped = ref('')
let link_tiktok = ref('')
let desc = ref('')
let caution = ref('')
let price = ref('')
let ingredient = ref('')
let product_category_id = ref('')
const router = useRouter()

onMounted(async () => {
    const productResponse = await axios.get(`/api/getProductById/${props.id}`)
    product.value = productResponse.data.product
    console.log(product.value)

    const categoriesResponse = await axios.get('/api/getProductCategories')
    product_categories.value = categoriesResponse.data.categories
    console.log(product_categories)

    // const shopsResponse = await axios.get('/api/getShops')
    // shops.value = shopsResponse.data.shops
    // console.log(shops)

    if (!product.value) {
        router.push({ name: 'admin/products' })
    } else {
        // Set field values with old data
        name.value = product.value.name
        desc.value = product.value.desc
        ingredient.value = product.value.ingredient
        caution.value = product.value.caution
        price.value = product.value.price
        product_category_id.value = product.value.product_category_id
        link_tokped.value = product.value.link_tokped
        link_shopee.value = product.value.link_shopee
        link_tiktok.value = product.value.link_tiktok
    }
})

const editproduct = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    formData.append('name', name.value)
    formData.append('desc', desc.value)
    formData.append('ingredient', ingredient.value)
    formData.append('caution', caution.value)
    formData.append('price', price.value)
    formData.append('product_category_id', product_category_id.value)
    // formData.append('shop_id', shop_id.value)
    formData.append('link_tokped', link_tokped.value) // Hardcoded for now
    formData.append('link_shopee', link_shopee.value) // Hardcoded for now
    formData.append('link_tiktok', link_tiktok.value) // Hardcoded for now

    if (files.value) {
        for (let i = 0; i < files.value.length; i++) {
            formData.append(`files[${i}]`, files.value[i])
        }
    }

    try {
        const response = await axios.post(`/api/editProduct/${props.id}`, formData, {
            headers: {
                'desc-Type': 'multipart/form-data'
            }
        })
        console.log(response.data)
        alert('product edited')
        router.push('/admin/products')
    } catch (error) {
        console.error(error.response.data)
        alert('Error editing product')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Edit product</h1>
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
        <!-- <p>Shop</p>
        <select v-if="shops.length > 0" v-model="shop_id">
            <option v-for="item in shops" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No Shop</p> -->
        <p>Category</p>
        <select v-if="product_categories.length > 0" v-model="product_category_id">
            <option v-for="item in product_categories" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No category</p>
        <p>add Images</p>
        <input type="file" multiple @change="files = $event.target.files" />
        <p>Link Shopee</p>
        <input type="text" v-model="link_shopee" />
        <p>Link tokped</p>
        <input type="text" v-model="link_tokped" />
        <p>Link tiktok</p>
        <input type="text" v-model="link_tiktok" />
        <button @click="editproduct()">Edit</button>
    </main>
    <AdminFooterComp />
</template>
