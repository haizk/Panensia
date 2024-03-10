<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink, useRouter } from 'vue-router'

const loggedIn = ref(localStorage.getItem('loggedIn'))
const router = useRouter()

const getLoggedIn = () => {
    loggedIn.value = localStorage.getItem('loggedIn')
}

const logout = () => {
    localStorage.removeItem('loggedIn')
    loggedIn.value = null
    router.push({ name: 'login' })
}

onMounted(() => {
    getLoggedIn()
})
</script>

<template>
    <nav>
        <RouterLink to="/login" v-if="!loggedIn">Login as Admin</RouterLink>
        <RouterLink to="/admin" v-if="loggedIn">Dashboard</RouterLink>
        <RouterLink to="/admin/news" v-if="loggedIn">News</RouterLink>
        <RouterLink to="/admin/news_categories" v-if="loggedIn">News Category</RouterLink>
        <RouterLink to="/admin/resellers" v-if="loggedIn">Resellers</RouterLink>
        <RouterLink to="/admin/contacts" v-if="loggedIn">Contacts</RouterLink>
        <RouterLink to="/admin/products" v-if="loggedIn">Products</RouterLink>
        <RouterLink to="/admin/admins" v-if="loggedIn">Administrators</RouterLink>
        <RouterLink to="/login" v-if="loggedIn" @click="logout">Logout</RouterLink>
    </nav>
</template>
