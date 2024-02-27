<script setup>
import { useRoute } from 'vue-router'

const route = useRoute()
</script>

<template>
    <div class="col-lg-7">
        <nav class="navbar">
          <ul class="navbar-links">
            <li :class="{ 'navbar-dropdown active': route.path === '/' }">
                <RouterLink to="/">Home</RouterLink>
            </li>
            <li :class="{ 'navbar-dropdown active': route.path === '/about' }">
                <RouterLink to="/about">About</RouterLink>
            </li>
            <li :class="{ 'navbar-dropdown active': route.path === '/berita' }">
              <RouterLink to="/berita">News</RouterLink>
            </li>
            <li :class="route.path === '/produk' || route.path === '/beritaproduk' ? 'navbar-dropdown active' : 'navbar-dropdown'">
              <RouterLink to="#">Product</RouterLink>
              <div class="dropdown">
                <RouterLink to="/produk">Product Catalog</RouterLink>
                <RouterLink to="/beritaproduk">Product News</RouterLink>
              </div>
            </li>
            <li :class="{ 'navbar-dropdown active': route.path === '/kontak' }">
              <RouterLink to="/kontak">Contact</RouterLink>
            </li>
          </ul>
        </nav>
    </div>
</template>