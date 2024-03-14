<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue'; 

let props = defineProps(['id']);
const admin = ref({});
const router = useRouter();

const getAdminData = async () => {
  try {
    const response = await axios.get(`/api/admins/${props.id}`, {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
      },
    });

    admin.value = response.data.admin;
  } catch (error) {
    console.error(error);
  }
};

const editAdmin = async () => {
  try {
    const response = await axios.post(`/api/admins/${props.id}`, {
      name: admin.value.name,
      email: admin.value.email,
      phone: admin.value.phone,
      is_superAdmin: parseInt(admin.value.is_superAdmin),
    }, {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
      },
    });

    console.log(response.data);
    alert('Admin edited');
    router.push({ name: 'admin.admins' });
  } catch (error) {
    console.error(error.response.data);
    alert('Error editing admin');
  }
};

onMounted(() => {
  getAdminData();
});
</script>

<template>
  <div>
    <header>
      <AdminNavComp />
    </header>
    <main>
      <h1>Edit Admin</h1>
      <form @submit.prevent="editAdmin">
        <label>Name</label>
        <input v-model="admin.name" />
        <br>
        <label>Email</label>
        <input v-model="admin.email" />
        <br>
        <label>Phone</label>
        <input v-model="admin.phone" />
        <br>
        <label>Set to Super Admin?</label>
        <select v-model="admin.is_superAdmin">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
        <br>
        <router-link :to="{ name: 'admin.admins' }">
          <button type="button">Cancel</button>
        </router-link>
        <button type="submit">Save</button>
      </form>
    </main>
    <AdminFooterComp />
  </div>
</template>