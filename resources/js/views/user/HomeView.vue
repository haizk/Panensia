<script setup>
import NavComp from '../../components/NavComp.vue'
import FooterComp from '../../components/FooterComp.vue'
</script>

<template>
    <header>
        <NavComp />
    </header>
    <main>
        <h1>User</h1>
        <div>This is the home view</div>
        <h1>VISITOR COUNT</h1>
        <div>Today: {{ $todayVisitors }}</div>
        <div>This week: {{ $weekVisitors }}</div>
        <div>This month: {{ $monthVisitors }}</div>
        <div>This year: {{ $yearVisitors }}</div>
        <div>Total: {{ $totalVisitors }}</div>
    </main>
    <FooterComp />
</template>
