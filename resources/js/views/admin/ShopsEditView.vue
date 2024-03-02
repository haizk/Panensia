<template>
  <header>
    <AdminNavComp />
  </header>
  <main>
    <div>
      <h2>Edit Shop</h2>

      <!-- Form for Editing Shop -->
      <form @submit.prevent="updateShop">
        <label for="name">Name:</label>
        <input v-model="shopData.name" type="text" id="name" required>

        <label for="desc">Description:</label>
        <textarea v-model="shopData.desc" id="desc" required></textarea>

        <label for="logo">Logo:</label>
        <div class="logo-container">
          <input type="file" ref="logo" @change="handleLogoChange">
          <img v-if="shopData.logo_path" :src="shopData.logo_path" alt="Shop Logo" class="logo-image">
          <div v-else class="uploading-status">Uploading...</div>
        </div>

        <label for="address">Address:</label>
        <input v-model="shopData.address" type="text" id="address" required>

        <label for="link_ig">Instagram Link:</label>
        <input v-model="shopData.link_ig" type="text" id="link_ig">

        <button type="submit">Update</button>
      </form>
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
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      shopData: {
        name: '',
        desc: '',
        logo_path: '',
        address: '',
        link_ig: '',
      },
      uploadingLogo: false,
    };
  },
  mounted() {
    // Fetch Shop data from API
    this.fetchShopData();
  },
  methods: {
    async fetchShopData() {
      try {
        const response = await fetch(`/api/shops/${this.id}`);
        const data = await response.json();
        this.shopData = data;
      } catch (error) {
        console.error('Error fetching shop data:', error);
      }
    },
    triggerFileInput() {
      this.$refs.logoInput.click();
    },
    handleLogoChange(event) {
      const file = event.target.files[0];
      this.uploadLogo(file);
    },
    async uploadLogo(file) {
      try {
        this.uploadingLogo = true;

        const formData = new FormData();
        formData.append('logo', file);

        const response = await fetch(`/api/shops/${this.id}/upload-logo`, {
          method: 'POST',
          body: formData,
        });

        if (response.ok) {
          const data = await response.json();
          this.shopData.logo_path = data.logo_path;
        } else {
          console.error('Failed to upload logo:', response.statusText);
        }
      } catch (error) {
        console.error('Error uploading logo:', error);
      } finally {
        this.uploadingLogo = false;
      }
    },
    async updateShop() {
      try {
        const response = await fetch(`/api/shops/${this.id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(this.shopData),
        });
        if (response.ok) {
          // Redirect to the Shop list after successful update
          this.$router.push({ name: 'admin.shops' });
        } else {
          console.error('Failed to update shop:', response.statusText);
        }
      } catch (error) {
        console.error('Error updating shop:', error);
      }
    },
  },
};
</script>

