<script setup>
import { RouterView } from 'vue-router'
import FooterComp from './components/Footer.vue'
import HeaderComp from './components/Header.vue'


</script>


<template>
            <HeaderComp />
            <RouterView />
        <FooterComp />
</template>
