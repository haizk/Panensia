<script>
import axios from 'axios';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

export default {
    components: {
        AdminNavComp,
        AdminFooterComp,
    },
    data() {
        return {
        admins: [],
        };
    },
    mounted() {
        this.fetchAdmins();
    },
    methods: {
        async fetchAdmins() {
        try {
            const response = await axios.get('/api/admins', {
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                },
            });
            this.admins = response.data;
        } catch (error) {
            console.error('Error fetching administrators:', error);
            alert('Error fetching administrators');
        }
        },
        async deleteAdmin(adminId) {
        if (window.confirm('Are you sure you want to delete this admin?') === false) {
            return;
        }

        try {
            const response = await axios.delete(`/api/admins/${adminId}`, {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
            });
            if (response.status === 200) {
            this.fetchAdmins();
            alert('Admin deleted');
            } else {
            console.error('Failed to delete admin:', response.statusText);
            alert('Failed to delete admin');
            }
        } catch (error) {
            console.error('Error deleting admin:', error);
            alert('Error deleting admin');
        }
        },
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
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="admin in admins" :key="admin.id">
                    <td>{{ admin.name }}</td>
                    <td>{{ admin.email }}</td>
                    <td>{{ admin.phone }}</td>
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
