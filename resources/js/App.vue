<script setup>
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import HeaderComp from './components/Header.vue'


</script>


<template>
    <div id="pageWrapper">
            <HeaderComp />
            <RouterView />
        <Footer />
    </div>
</template>
