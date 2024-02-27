<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
    <nav>
        <RouterLink to="/admin">Dashboard</RouterLink>
        <RouterLink to="/admin/news">News</RouterLink>
        <RouterLink to="/admin/news_categories">News Category</RouterLink>
        <RouterLink to="/admin/shops/add">Add Shop</RouterLink>
        <RouterLink to="/admin/shops/edit">Edit Shop</RouterLink>
        <RouterLink to="/admin/shops/delete">Delete Shop</RouterLink>
        <RouterLink to="/admin/shops/view">View Shops</RouterLink>
        <RouterLink to="/admin/contacts">Contacts</RouterLink>
    </nav>
</template>
