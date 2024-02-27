<template>
  <header>
    <AdminNavComp />
  </header>
  <main>
    <div>
      <h2>Create Shop</h2>

      <!-- Form for Creating Shop -->
      <form @submit.prevent="saveShopAndUploadLogo">
        <label for="name">Name:</label>
        <input v-model="shopData.name" type="text" id="name" required>

        <label for="desc">Description:</label>
        <textarea v-model="shopData.desc" id="desc" required></textarea>

        <label for="logo">Logo:</label>
        <div class="logo-container">
          <input type="file" ref="logo" @change="uploadLogo">
          <img v-if="shopData.logo_path && !uploadingLogo" :src="shopData.logo_path" alt="Shop Logo" class="logo-image">
          <div v-if="uploadingLogo" class="uploading-status">Uploading...</div>
        </div>

        <label for="address">Address:</label>
        <input v-model="shopData.address" type="text" id="address" required>

        <label for="link_ig">Instagram Link:</label>
        <input v-model="shopData.link_ig" type="text" id="link_ig">

        <button type="submit">Save</button>
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
  methods: {
    async saveShopAndUploadLogo() {
      await this.saveShop();
      await this.uploadLogo();
    },
    async saveShop() {
      try {
        const response = await fetch('/api/shops', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(this.shopData),
        });

        if (response.ok) {
          console.log('Shop created successfully!');
          // Redirect to the Shop list after successful creation
          this.$router.push({ name: 'admin.shops' });
        } else {
          console.error('Failed to create shop:', response.statusText);
        }
      } catch (error) {
        console.error('Error creating shop:', error);
      }
    },
    async uploadLogo() {
      const fileInput = this.$refs.logo;
      if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        try {
          this.uploadingLogo = true;

          const formData = new FormData();
          formData.append('logo', file);

          const response = await fetch(`/api/shops/upload-logo`, {
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
      }
    },
  },
};
</script>
