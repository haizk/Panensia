<script setup>
import { onMounted, ref, defineProps } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])
let admin = ref(null)
let name = ref('')
let is_superAdmin = ref(0)

const router = useRouter();

const getAdminData = async () => {
    const response = await axios.get(`/api/getAdminById/${props.id}`)
    admin.value = response.data.admin
    name.value = admin.value.name
    is_superAdmin.value = admin.value.is_superAdmin
}

const editAdmin = async () => {
    try {
        const response = await axios.post(`/api/admins/${props.id}`, {
            name: name.value,
            is_superAdmin: parseInt(is_superAdmin.value),
        });

        console.log(response.data);
        alert('Admin edited');
        // Redirect or perform other actions as needed
        router.push({ name: 'admin.admins' });
    } catch (error) {
        console.error(error.response.data);
        alert('Error editing admin');
    }
};

// Fetch admin data on component mount
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
      <p>Name</p>
      <input type="text" v-model="name" />
      <p>Is Super Admin</p>
      <select v-model="is_superAdmin">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
      <button @click="editAdmin">Edit Admin</button>
    </main>
    <AdminFooterComp />
  </div>
</template>