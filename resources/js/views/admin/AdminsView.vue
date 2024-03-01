<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let admin = ref([])

onMounted(async () => {
    try {
        const response = await axios.get('/api/admins')
        console.log(response.data);  // Log the entire response
        admin.value = response.data;
    } catch (error) {
        console.error(error);
        alert('Error fetching administrators');
    }
});


const deleteAdmin = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this admin?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/admins/${id}`)
        console.log(response.data)
        alert('Admin deleted')
        admin.value = admin.value.filter((item) => item.id !== id)
    } catch (error) {
        console.error(error)
        alert(error.response.data.message)
    }
}
</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <h1>Administrators </h1>
        <p>Total row: {{ admin.length }}</p>
        <RouterLink to="/admin/admins/create">
            <button>Create</button>
        </RouterLink>
        <table v-if="admin.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in admin" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.is_superAdmin === 1 ? 'Super Admin' : 'Admin' }}</td>
                    <td>
                        <RouterLink :to="{ name: 'admin.admins.edit', params: { id: item.id } }">
                            <button>Edit Admin Role</button>
                        </RouterLink>
                        <button @click="deleteAdmin(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <AdminFooterComp />
</template>

<style scoped>
table {
    border-collapse: collapse;
}

th,
td {
    border: 1px solid black;
    text-align: center;
    width: 16%;
}
</style>
