<template>
    <div>
      <h2>Contacts</h2>
  
      <!-- Display Contacts -->
      <ul>
        <li v-for="contact in contacts" :key="contact.id">
          {{ contact.name }} - {{ contact.email }}
          <!-- Tambahkan pengecekan role pengguna sebelum menampilkan tombol edit dan hapus -->
          <template v-if="isAdmin">
            <router-link :to="{ name: 'admin.contacts.edit', params: { id: contact.id }}">Edit</router-link>
            <button @click="deleteContact(contact.id)">Delete</button>
          </template>
        </li>
      </ul>
  
      <!-- Button untuk membuat kontak (hanya untuk pengguna) -->
      <router-link v-if="!isAdmin" :to="{ name: 'user.contacts.create' }">Create Contact</router-link>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        contacts: [],
        isAdmin: false, // Sesuaikan ini dengan logika autentikasi pengguna
      };
    },
    mounted() {
      // Fetch Contacts from API
      this.fetchContacts();
      // Set isAdmin berdasarkan role pengguna atau status autentikasi
      this.isAdmin = true; // Gantilah ini dengan logika autentikasi pengguna
    },
    methods: {
      fetchContacts() {
        // Fetch Contacts from API and update the 'contacts' data property
      },
      deleteContact() {
        // Delete contact using API (if allowed)
      },
    },
  };
  </script>
  