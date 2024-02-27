<template>
  <div>
    <h2>Contacts</h2>

    <!-- Display Contacts in a table -->
    <table>
      <thead>
        <tr>
          <th>Type</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
          <td>{{ contact.type }}</td>
          <td>{{ contact.name }}</td>
          <td>{{ contact.email }}</td>
          <td>{{ contact.message }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      contacts: [],
    };
  },
  mounted() {
    // Fetch Contacts from API
    this.fetchContacts();
  },
  methods: {
    async fetchContacts() {
      try {
        const response = await fetch('/api/contacts'); // Ganti ini dengan endpoint API yang sesuai
        const data = await response.json();
        this.contacts = data; // Pastikan bahwa struktur data dari API sesuai dengan yang diharapkan
      } catch (error) {
        console.error('Error fetching contacts:', error);
      }
    },
  },
};
</script>
