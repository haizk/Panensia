<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

let name = ref('');
let phone = ref('');
let email = ref('');
let password = ref('');
let is_superAdmin = ref(false);
const router = useRouter();

const createAdmin = async () => {
    try {
        const response = await axios.post('/api/admins', {
            name: name.value,
            email: email.value,
            phone: phone.value,
            password: password.value,
            is_superAdmin: parseInt(is_superAdmin.value),
        }, {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            }
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
            <label>Phone</label>
            <input type="tel" v-model="phone" />
            <br>
            <label>Password</label>
            <input type="password" v-model="password" />
            <br>
            <label>Set to Super Admin?</label>
            <select v-model="is_superAdmin">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <br>
            <router-link :to="{ name: 'admin.admins' }">
                <button type="button">Cancel</button>
            </router-link>
            <button @click="createAdmin">Save</button>
        </main>
        <AdminFooterComp />
    </div>
</template>
