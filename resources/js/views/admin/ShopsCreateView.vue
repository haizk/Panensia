<template>
    <div>
      <h2>Create Shop</h2>
  
      <!-- Form for Creating Shop -->
      <form @submit.prevent="saveShop">
        <!-- Add form fields for creating a shop -->
  
        <button type="submit">Save</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      saveShop() {
        // Save shop using API
      },
    },
  };
  </script>
  