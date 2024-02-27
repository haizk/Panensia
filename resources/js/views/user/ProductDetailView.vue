<script setup>
import { useRouter } from 'vue-router'
import { onMounted, ref } from 'vue'
import axios from 'axios'

import NavComp from '../../components/NavComp.vue'
import FooterComp from '../../components/FooterComp.vue'

let props = defineProps(['id'])
let product = ref(null)
let router = useRouter()

onMounted(async () => {
    const response = await axios.get(`/api/getProductById/${props.id}`)
    product.value = response.data.product
    console.log(product.value)

    if (!product.value) {
        router.push({ name: 'product' })
    }
})
</script>

<template>
    <header>
        <NavComp />
    </header>
    <main>
        <h1>User product Detail</h1>
        <div v-if="product">
            <p>id: {{ product.id }}</p>
            <p>name: {{ product.name }}</p>
            <template v-for="image in product.product_images" :key="image.id">
                <img :src="image.path" width="100" />
            </template>
            <p>desc: {{ product.desc }}</p>
            <p>shop id: {{ product.shop.id }}</p>
            <p>shop name: {{ product.shop.name }}</p>
            <p>created_at: {{ product.created_at }}</p>
            <p>updated_at: {{ product.updated_at }}</p>
        </div>
    </main>
    <FooterComp />
</template>
