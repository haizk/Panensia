<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])
let product_categories = ref([])
let name = ref('')
const router = useRouter()

onMounted(async () => {
    const productCategoryResponse = await axios.get(`/api/getProductCategoryById/${props.id}`)
    product_categories.value = productCategoryResponse.data.category
    console.log(product_categories.value)

    if (!product_categories.value) {
        router.push({ name: 'admin.product_categories' })
    }
})

const editCategory = async () => {
    // Add validation / CSRF token

    let slug = name.value
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '')

    const productData = {
        name: name.value,
        slug: slug
    }

    try {
        const response = await axios.post(`/api/editProductCategory/${props.id}`, productData)
        console.log(response.data)
        alert('Product category edited')
        router.push('/admin/product_categories')
    } catch (error) {
        console.error(error)
        alert('Error editing product category')
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Admin Edit Product Category</h1>
        <p>name</p>
        <input type="text" v-model="name" />
        <button @click="editCategory()">Edit</button>
    </main>
    <AdminFooterComp />
</template>
