<script setup>
import { RouterView, useRoute } from 'vue-router'
import { ref, watch } from 'vue'

import NavComp from './components/NavComp.vue'
import FooterComp from './components/FooterComp.vue'
import AdminFooterComp from './components/AdminFooterComp.vue'
import AdminNavComp from './components/AdminNavComp.vue'

let route = useRoute()
let isAdmin = ref(false)

watch(() => route, (to) => {
    isAdmin.value = to.path.startsWith('/admin')
}, { immediate: true })

console.log(isAdmin)
</script>

<template>
    <header>
        <component :is="isAdmin ? AdminNavComp : NavComp" />
    </header>

    <main>
        <RouterView />
    </main>

    <component :is="isAdmin ? AdminFooterComp : FooterComp" />
</template>
