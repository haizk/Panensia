<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

const admins = ref([]);

axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

const fetchAdmins = async () => {
    try {
        const response = await axios.get('/api/admins');
        admins.value = response.data;
    } catch (error) {
        console.error('Error fetching administrators:', error);
        alert('Error fetching administrators');
    }
    };

    const deleteAdmin = async (adminId) => {
    if (!window.confirm('Are you sure you want to delete this admin?')) {
        return;
    }

    try {
        const response = await axios.delete(`/api/admins/${adminId}`);
        if (response.status === 200) {
            fetchAdmins();
            alert('Admin deleted');
        } else {
            console.error('Failed to delete admin:', response.statusText);
            alert('Failed to delete admin');
        }
    } catch (error) {
        console.error('Error deleting admin:', error);
        alert('Error deleting admin');
    }
    };

    onMounted(() => {
    fetchAdmins();
    });

    // eslint-disable-next-line no-unused-vars
    const beforeRouteEnter = (to, from, next) => {
    if (to.matched.some(record => record.meta.requiresSuperAdmin)) {
        const token = localStorage.getItem('token');
        if (token) {
        axios.get('/api/user', {
        })
            .then(response => {
            const user = response.data.user;
            if (user.is_superAdmin === 1) {
                next();
            } else {
                next({ name: 'admin.unauthorized' });
            }
            })
            .catch(error => {
            console.error('Error fetching user data:', error);
            next({ name: 'admin.unauthorized' });
            });
        } else {
        next({ name: 'dashboard' });
        }
    } else {
        next();
    }
};

</script>

<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <div>
        <h2>Administrators</h2>
        <router-link :to="{ name: 'admin.admins.create' }">
            <button>Create</button>
        </router-link>
        <table width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="admin in admins" :key="admin.id">
                    <td>{{ admin.name }}</td>
                    <td>{{ admin.email }}</td>
                    <td>{{ admin.is_superAdmin === 1 ? 'Super Admin' : 'Admin' }}</td>
                    <td>
                    <router-link :to="{ name: 'admin.admins.edit', params: { id: admin.id }}">
                        <button>Edit</button>
                    </router-link>
                    <button @click="deleteAdmin(admin.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <footer>
        <AdminFooterComp />
    </footer>
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
