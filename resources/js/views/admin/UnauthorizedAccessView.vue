<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Unauthorized Access</h1>
        <p>You do not have permission to access this page.</p>
    </main>
    <AdminFooterComp />
</template>

<script setup>
    import AdminNavComp from '../../components/AdminNavComp.vue';
    import AdminFooterComp from '../../components/AdminFooterComp.vue';
</script>