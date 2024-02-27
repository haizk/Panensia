<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <div>
        <h2>Shop Details</h2>
    
        <!-- Display Shop Details -->
        <div>
            <p><strong>Name:</strong> {{ shopData.name }}</p>
            <p><strong>Description:</strong> {{ shopData.desc }}</p>
            <p><strong>Logo:</strong> <img :src="shopData.logo_path" alt="Shop Logo"></p>
            <p><strong>Address:</strong> {{ shopData.address }}</p>
            <p v-if="shopData.link_ig"><strong>Instagram Link:</strong> {{ shopData.link_ig }}</p>
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
        shopData: {
          name: '',
          desc: '',
          logo_path: '',
          address: '',
          link_ig: '',
        },
      };
    },
    mounted() {
      // Fetch Shop data from API on component mount
      this.fetchShopData();
    },
    methods: {
      async fetchShopData() {
        try {
          const response = await fetch(`/api/shops/${this.$route.params.id}`);
          const data = await response.json();
          this.shopData = data;
        } catch (error) {
          console.error('Error fetching shop data:', error);
        }
      },
    },
  };
  </script>
  