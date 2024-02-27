<template>
    <div>
      <h2>Create Contact</h2>
  
      <!-- Form for Creating Contact -->
      <form @submit.prevent="saveContact">
        <!-- Add form fields for creating a contact -->
        <label>Name: </label>
        <input v-model="contactForm.name" required>
  
        <label>Email: </label>
        <input v-model="contactForm.email" required>
  
        <!-- Hanya tambahkan form field untuk user pada create contact -->
        <label>User: </label>
        <input v-model="contactForm.user" required>
  
        <button type="submit">Save</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        contactForm: {
          name: '',
          email: '',
          user: '', // Tambahkan ini untuk user
        },
      };
    },
    methods: {
      saveContact() {
        // Save contact using API (if allowed)
      },
    },
  };
  </script>
  