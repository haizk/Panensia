<template>
    <header>
      <NavComp />
    </header>
    <main>
        <div>
            <h2>Daftar Menjadi Reseller</h2>

            <!-- Form for Register Reseller -->
            <form @submit.prevent="saveResellerAndUploadLogo">

            <!-- Nama -->
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" v-model="resellerData.name" class="form-control" id="name" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone (WhatsApp):</label>
                <input type="text" v-model="resellerData.phone" class="form-control" id="phone" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" v-model="resellerData.email" class="form-control" id="email" required>
            </div>

            <!-- Brand -->
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" v-model="resellerData.brand" class="form-control" id="brand" required>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea v-model="resellerData.address" class="form-control" id="address" required></textarea>
            </div>

            <!-- Logo Brand (opsional) -->
            <div class="form-group">
                <label for="logo_path">Logo Brand (opsional):</label>
                <input type="file" ref="logo_path" @change="uploadLogo" class="form-control" id="logo_path">
                <img v-if="resellerData.logo_path && !uploadingLogo" :src="resellerData.logo_path" alt="Reseller Logo" class="logo-image">
                <div v-if="uploadingLogo" class="uploading-status">Uploading...</div>
            </div>

            <!-- Link Sosial Media (opsional) -->
            <div class="form-group">
                <label for="link_social">Link Sosial Media (opsional):</label>
                <input type="text" v-model="resellerData.link_social" class="form-control" id="link_social">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </main>
    <footer>
        <FooterComp />
    </footer>
</template>

<script>
import NavComp from '../../components/NavComp.vue'
import FooterComp from '../../components/FooterComp.vue'
export default {
    components: {
      NavComp,
      FooterComp,
    },
    data() {
        return {
            resellerData: {
                name: '',
                phone: '',
                email: '',
                brand: '',
                address: '',
                logo_path: '',
                link_social: '',
            },
            uploadingLogo: false,
        };
    },
    methods: {
    async saveResellerAndUploadLogo() {
      await this.saveReseller();
      await this.uploadLogo();
    },
    async saveReseller() {
      try {
        const response = await fetch('/api/reseller', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(this.resellerData),
        });

        if (response.ok) {
          console.log('Reseller registered successfully!');
          this.$router.push({ name: 'home' });
        } else {
          console.error('Failed to register reseller:', response.statusText);
        }
      } catch (error) {
        console.error('Error creating reseller:', error);
      }
    },
    async uploadLogo() {
        const fileInput = this.$refs.logo_path;
        if (fileInput && fileInput.files.length > 0) {
            const file = fileInput.files[0];
            try {
                this.uploadingLogo = true;

                const formData = new FormData();
                formData.append('logo', file);

                const response = await fetch(`/api/reseller/upload-logo`, {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    const data = await response.json();
                    this.resellerData.logo_path = data.logo_path;
                } else {
                    console.error('Failed to upload logo:', response.statusText);
                }
            } catch (error) {
                console.error('Error uploading logo:', error);
            } finally {
                this.uploadingLogo = false;
            }
        }
    }
  },
};
</script>