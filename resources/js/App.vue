<script setup>
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Loader from './components/Loader.vue'

</script>

<template>
    <header>
        <Header />
    </header>
    <Loader />
    <main>
        <RouterView />
    </main>

    <Footer />
</template>
