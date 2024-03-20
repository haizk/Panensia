<template>
  <header>
    <AdminNavComp />
  </header>
  <main>
    <div>
      <h2>Resellers</h2>

      <!-- Display Resellers in a table -->
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Brand</th>
          <th>Address</th>
          <th>Logo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="reseller in resellers" :key="reseller.id">
          <td>{{ reseller.name }}</td>
          <td>{{ reseller.phone }}</td>
          <td>{{ reseller.email }}</td>
          <td>{{ reseller.brand }}</td>
          <td>{{ reseller.address }}</td>
          <td>
            <img v-if="reseller.logo_path" :src="reseller.logo_path" alt="Reseller Logo" class="logo-image">
            <span v-else>No Logo</span>
          </td>
          <td>
            <router-link :to="{ name: 'admin.reseller.edit', params: { id: reseller.id }}">Edit</router-link>
            <router-link :to="{ name: 'admin.reseller.detail', params: { id: reseller.id }}">Details</router-link>
            <button @click="deleteReseller(reseller.id)">Delete</button>
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

<script>
import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

export default {
  components: {
    AdminNavComp,
    AdminFooterComp
  },
  data() {
    return {
      resellers: [],
    };
  },
  mounted() {
    // Fetch Resellers from API
    this.fetchResellers();
  },
  methods: {
    async fetchResellers() {
      try {
        const response = await fetch('/api/resellers');
        const data = await response.json();
        this.resellers = data;
      } catch (error) {
        console.error('Error fetching resellers:', error);
      }
    },
    async deleteReseller(resellerId) {
      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch(`/api/resellers/${resellerId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
          },
        });
        if (response.ok) {
          // Update resellers list after successful deletion
          this.fetchResellers();
        } else {
          console.error('Failed to delete reseller:', response.statusText);
        }
      } catch (error) {
        console.error('Error deleting reseller:', error);
      }
    },
    async activateReseller(resellerId) {
      try {
        const response = await fetch(`/api/resellers/activate/${resellerId}`, {
          method: 'PUT',
        });
        if (response.ok) {
          // Update resellers list after successful activation
          this.fetchResellers();
        } else {
          console.error('Failed to activate reseller:', response.statusText);
        }
      } catch (error) {
        console.error('Error activating reseller:', error);
      }
    },
    async deactivateReseller(resellerId) {
      try {
        const response = await fetch(`/api/resellers/deactivate/${resellerId}`, {
          method: 'PUT',
        });
        if (response.ok) {
          // Update resellers list after successful deactivation
          this.fetchResellers();
        } else {
          console.error('Failed to deactivate reseller:', response.statusText);
        }
      } catch (error) {
        console.error('Error deactivating reseller:', error);
      }
    },
  },
};
</script>