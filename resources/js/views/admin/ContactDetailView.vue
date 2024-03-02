<template>
    <header>
        <AdminNavComp />
    </header>
    <main>
        <div>
        <h2>Contact Detail</h2>
    
        <!-- Display Contact details -->
        <div v-if="contact">
            <strong>Type:</strong> {{ contact.type }}<br>
            <strong>Name:</strong> {{ contact.name }}<br>
            <strong>Email:</strong> {{ contact.email }}<br>
            <strong>Message:</strong> {{ contact.message }}
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
        contact: null,
      };
    },
    mounted() {
      // Fetch Contact details from API
      this.fetchContact();
    },
    methods: {
      async fetchContact() {
        try {
          const response = await fetch(`/api/contacts/${this.$route.params.id}`);
          const data = await response.json();
          this.contact = data;
        } catch (error) {
          console.error('Error fetching contact details:', error);
        }
      },
    },
  };
  </script>