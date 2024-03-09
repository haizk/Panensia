<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

let name = ref('');
let email = ref('');
let password = ref('');
let is_superAdmin = ref(false);
const router = useRouter();

axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

const createAdmin = async () => {
    try {
        const response = await axios.post('/api/admins', {
            name: name.value,
            email: email.value,
            password: password.value,
            is_superAdmin: is_superAdmin.value,
    });

        console.log(response.data);
        alert('Admin created');
        router.push({ name: 'admin.admins' }); 
    } catch (error) {
        console.error(error.response.data);
        alert('Error creating admin');
    }
};
</script>

<template>
    <div>
        <header>
            <AdminNavComp />
        </header>
        <main>
            <h1>Admin Create Admin</h1>
            <label>Name</label>
            <input type="text" v-model="name" />
            <br>
            <label>Email</label>
            <input type="email" v-model="email" />
            <br>
            <label>Password</label>
            <input type="password" v-model="password" />
            <br>
            <label>Is Super Admin?</label>
            <input type="checkbox" v-model="is_superAdmin" />
            <br>
            <button @click="createAdmin">Create</button>
        </main>
        <AdminFooterComp />
    </div>
</template>
