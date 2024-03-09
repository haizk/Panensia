<script setup>
import { onMounted, ref, defineProps } from 'vue';
import axios from 'axios';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

const props = defineProps(['id']);
const admin = ref({});

onMounted(async () => {
  try {
    const response = await axios.get(`/api/admins/${props.id}`);
    admin.value = response.data;
  } catch (error) {
    console.error(error);
    alert('Error fetching admin profile');
  }
});
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
    </main>
    <AdminFooterComp />
  </div>
</template>
