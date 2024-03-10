<script setup>
import { onMounted, ref, defineProps } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id']);
let admin = ref({});
let name = ref('');
let phone = ref('');
let is_superAdmin = ref(0);
let newPassword = ref('');

const router = useRouter();

const getAdminData = async () => {
  try {
    const response = await axios.get(`/api/getAdminById/${props.id}`, {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}`,
      },
    });
    admin.value = response.data.admin;
    name.value = admin.value.name;
    phone.value = admin.value.phone;
    is_superAdmin.value = admin.value.is_superAdmin;
  } catch (error) {
    console.error(error);
  }
};

const editAdmin = async () => {
  try {
    const response = await axios.post(`/api/admins/${props.id}`, {
      name: name.value,
      phone: phone.value,
      is_superAdmin: parseInt(is_superAdmin.value),
      password: newPassword.value.trim() !== '' ? newPassword.value : undefined,
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
    getAdminData()
})
</script>

<template>
  <div>
    <header>
      <AdminNavComp />
    </header>
    <main>
      <h1>Admin Edit</h1>
      <label>Name</label>
      <input type="text" v-model="name" />
      <br>
      <label>Phone</label>
      <input type="text" v-model="phone" />
      <br>
      <label>Super Admin?</label>
      <select v-model="is_superAdmin">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
      <br>
      <label>New Password</label>
      <input type="password" v-model="newPassword" />
      <br>
      <button @click="editAdmin">Edit Admin</button>
    </main>
    <AdminFooterComp />
  </div>
</template>