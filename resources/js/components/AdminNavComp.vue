<script setup>
import { RouterLink, ref, watch } from 'vue'
import { useRouter } from 'vue-router'

const loggedIn = ref(!!localStorage.getItem('loggedIn'))
const router = useRouter()

const logout = () => {
    // Perform logout logic (remove items from localStorage, etc.)
    localStorage.removeItem('loggedIn')
    localStorage.removeItem('token')
    loggedIn.value = false
    // Redirect to login page
    router.push({ name: 'login' })
}

watch(loggedIn, (newVal) => {
    // Redirect to login page when the user is not logged in
    if (!newVal) {
        router.push({ name: 'login' })
    }
})
</script>

<template>
    <nav>
        <RouterLink to="/login" v-if="!loggedIn">Login as Admin</RouterLink>
        <RouterLink to="/admin" v-if="!loggedIn">Dashboard</RouterLink>
        <RouterLink to="/admin/news" v-if="loggedIn">News</RouterLink>
        <RouterLink to="/admin/news_categories" v-if="loggedIn">News Category</RouterLink>
        <RouterLink to="/admin/shops" v-if="loggedIn">Shops</RouterLink>
        <RouterLink to="/admin/contacts" v-if="loggedIn">Contacts</RouterLink>
        <RouterLink to="/admin/products" v-if="loggedIn">Products</RouterLink>
        <RouterLink v-if="loggedIn" @click="logout">Logout</RouterLink>
    </nav>
</template>
