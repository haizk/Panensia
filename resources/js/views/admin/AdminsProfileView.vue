<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

const admin = ref({});
const router = useRouter();

onMounted(async () => {
    try {
        const response = await axios.get('/api/user', {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
        });
        admin.value = response.data.user;
    } catch (error) {
        console.error(error);
        alert('Error fetching admin profile');
    }
});

const navigateToChangePassword = () => {
    router.push({ name: 'admin.change_password', params: { id: admin.value.id } });
};
</script>

<template>
  <div>
    <header>
      <AdminNavComp />
    </header>
    <main>
      <h1>Admin Profile</h1>
      <p>Name: {{ admin.name }}</p>
      <p>Email: {{ admin.email }}</p>
      <p>Phone: {{ admin.phone }}</p>
      <button @click="navigateToChangePassword">Change Password</button>
    </main>
    <AdminFooterComp />
  </div>
</template>
