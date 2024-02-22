<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
    <div class="col-lg-7">
        <nav class="navbar">
          <ul class="navbar-links">
            <li class="navbar-dropdown active">
                <RouterLink to="/">Home</RouterLink>
            </li>
            <li class="navbar-dropdown">
                <RouterLink to="/about">About</RouterLink>
            </li>
            <li class="navbar-dropdown">
              <RouterLink to="/berita">News</RouterLink>
            </li>
            <li class="navbar-dropdown">
              <RouterLink to="#">Product</RouterLink>
              <div class="dropdown">
                <RouterLink to="/produk">Product Catalog</RouterLink>
                <RouterLink to="/berita">Product News</RouterLink>
              </div>
            </li>
            <li class="navbar-dropdown ">
              <a href="/kontak">Contacts</a>
            </li>
          </ul>
        </nav>
    </div>
</template>
