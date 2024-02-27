<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
    <nav>
        <RouterLink to="/admin">Dashboard</RouterLink>
        <RouterLink to="/admin/news">News</RouterLink>
        <RouterLink to="/admin/news_categories">News Category</RouterLink>
        <RouterLink to="/admin/shops">Shops</RouterLink>
        <RouterLink to="/admin/contacts">Contacts</RouterLink>
    </nav>
</template>
