<template>
    <div>
      <h2>Shops</h2>
  
      <!-- Display Shops -->
      <ul>
        <li v-for="shop in shops" :key="shop.id">
          {{ shop.name }} - {{ shop.address }}
          <router-link :to="{ name: 'admin.shops.edit', params: { id: shop.id }}">Edit</router-link>
          <button @click="deleteShop(shop.id)">Delete</button>
        </li>
      </ul>
  
      <!-- Button to navigate to Create Shop view -->
      <router-link :to="{ name: 'admin.shops.create' }">Create Shop</router-link>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        shops: [],
      };
    },
    mounted() {
      // Fetch Shops from API
      this.fetchShops();
    },
    methods: {
      fetchShops() {
        // Fetch Shops from API and update the 'shops' data property
      },
    deleteShop() {
        // Delete shop using API
      },
    },
  };
  </script>
  