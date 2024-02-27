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
      shops: [],
    };
  },
  mounted() {
    // Fetch Shops from API
    this.fetchShops();
  },
  methods: {
    async fetchShops() {
      try {
        const response = await fetch('/api/shops');
        const data = await response.json();
        this.shops = data;
      } catch (error) {
        console.error('Error fetching shops:', error);
      }
    },
    async deleteShop(shopId) {
      try {
        const response = await fetch(`/api/shops/${shopId}`, {
          method: 'DELETE',
        });
        if (response.ok) {
          // Update shops list after successful deletion
          this.fetchShops();
        } else {
          console.error('Failed to delete shop:', response.statusText);
        }
      } catch (error) {
        console.error('Error deleting shop:', error);
      }
    },
  },
};
</script>
<template>
  <header>
    <AdminNavComp />
  </header>
  <main>
    <div>
      <h2>Shops</h2>

      <!-- Display Shops in a table -->
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="shop in shops" :key="shop.id">
            <td>{{ shop.name }}</td>
            <td>{{ shop.address }}</td>
            <td>
              <router-link :to="{ name: 'admin.shops.edit', params: { id: shop.id }}">Edit</router-link>
              <router-link :to="{ name: 'admin.shops.detail', params: { id: shop.id }}">Details</router-link>
              <button @click="deleteShop(shop.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Button to navigate to Create Shop view -->
      <router-link :to="{ name: 'admin.shops.create' }">Create Shop</router-link>
    </div>
  </main>
  <footer>
    <AdminFooterComp />
  </footer>
</template>