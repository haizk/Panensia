<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <div>
        <h2>Reseller Details</h2>
    
        <!-- Display Reseller Details -->
        <div>
            <p><strong>Name:</strong> {{ resellerData.name }}</p>
            <p><strong>Description:</strong> {{ resellerData.desc }}</p>
            <p><strong>Logo:</strong> <img :src="resellerData.logo_path" alt="Reseller Logo"></p>
            <p><strong>Address:</strong> {{ resellerData.address }}</p>
            <p v-if="resellerData.link_ig"><strong>Social Media Link:</strong> {{ resellerData.link_ig }}</p>
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
  