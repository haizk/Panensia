<template>
  <header>
    <AdminNavComp />
  </header>
  <main>
    <div>
      <h2>Reseller Details</h2>

      <!-- Display Reseller Details -->
      <div>
        <div>
          <strong>Name:</strong> {{ resellerData.name }}
        </div>
        <div>
          <strong>Phone:</strong> {{ resellerData.phone }}
        </div>
        <div>
          <strong>Email:</strong> {{ resellerData.email }}
        </div>
        <div>
          <strong>Brand:</strong> {{ resellerData.brand }}
        </div>
        <div>
          <strong>Address:</strong> {{ resellerData.address }}
        </div>
        <div v-if="resellerData.logo_path">
          <strong>Logo:</strong>
          <img :src="resellerData.logo_path" alt="Reseller Logo" style="max-width: 200px;">
        </div>
        <div v-if="resellerData.link_social">
          <strong>Social Media Link:</strong> {{ resellerData.link_social }}
        </div>
      </div>
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
      resellerData: {
        name: '',
        phone: '',
        email: '',
        brand: '',
        address: '',
        logo_path: '',
        link_social: '',
      },
    };
  },
  mounted() {
    // Fetch Reseller data from API on component mount
    this.fetchResellerData();
  },
  methods: {
    async fetchResellerData() {
      try {
        const response = await fetch(`/api/resellers/${this.$route.params.id}`);
        const data = await response.json();
        this.resellerData = data;
      } catch (error) {
        console.error('Error fetching reseller data:', error);
      }
    },
  },
};
</script>
