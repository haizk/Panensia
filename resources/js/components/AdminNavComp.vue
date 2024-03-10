<script setup>
import { ref, onMounted } from 'vue';
import { RouterLink, useRouter } from 'vue-router';
import axios from 'axios';

const loggedIn = ref(localStorage.getItem('loggedIn'));
const router = useRouter();

const getLoggedIn = () => {
  loggedIn.value = localStorage.getItem('loggedIn');
};

const logout = async () => {
  const confirmLogout = window.confirm('Are you sure you want to log out?');
  
  if(!confirmLogout){
    return;
  }
  
  try {
    const response = await axios.post('/api/logout', {}, {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}`
      }
    });

    if (response.data.status === 'success') {
      localStorage.removeItem('loggedIn');
      localStorage.removeItem('token');
      loggedIn.value = null;
      router.push({ name: 'login' });
    } else {
      console.error('Logout failed:', response.data.message);
    }
  } catch (error) {
    console.error('Error during logout:', error);
  }
};


onMounted(() => {
  getLoggedIn();
});
</script>

<template>
    <nav>
        <RouterLink to="/login" v-if="!loggedIn">Login as Admin</RouterLink>
        <RouterLink to="/admin" v-if="loggedIn">Dashboard</RouterLink>
        <RouterLink to="/admin/news" v-if="loggedIn">News</RouterLink>
        <RouterLink to="/admin/news_categories" v-if="loggedIn">News Category</RouterLink>
        <RouterLink to="/admin/shops" v-if="loggedIn">Shops</RouterLink>
        <RouterLink to="/admin/contacts" v-if="loggedIn">Contacts</RouterLink>
        <RouterLink to="/admin/products" v-if="loggedIn">Products</RouterLink>
        <RouterLink to="/admin/admins" v-if="loggedIn">Administrators</RouterLink>
        <RouterLink to="/admin/profile" v-if="loggedIn">Your Profile</RouterLink>
        <RouterLink to="/login" v-if="loggedIn" @click="logout">Logout</RouterLink>
    </nav>
</template>
