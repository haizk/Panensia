<script setup>
import { RouterView } from 'vue-router'
import Nav from './components/Nav.vue'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'

</script>

<template>
    <header>
        <Nav />
        <Header />
    </header>

    <main>
        <RouterView />
    </main>

    <Footer />
</template>
