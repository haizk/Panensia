<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

let props = defineProps(['id'])

let images = ref([])

onMounted(async () => {
    const response = await axios.get(`/api/getImagesByProductId/${props.id}`)
    images.value = response.data.images
    console.log(images.value)
})

const deleteImage = async (id) => {
    // Add validation / CSRF token

    if (window.confirm('Are you sure you want to delete this product?') === false) {
        return
    }

    try {
        const response = await axios.delete(`/api/deleteProductImage/${id}`)
        console.log(response.data)
        alert('image deleted')
        images.value = images.value.filter((item) => item.id !== id)
    } catch (error) {
        console.error(error)
        alert(error.response.data.message)
    }
}
</script>

<template>
    <!-- <main>
        <h1>Admin product images {{ images.length }}</h1>
        <table v-if="images.length > 0" width="100%">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Category</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in images" :key="item.id">
                    <td>{{ item.order }}</td>
                    <td>{{ item.product.name }}</td>
                    <td>
                        <img :src="`/storage/${item.path}`" width="100" />
                    </td>
                    <td>
                        <button @click="deleteImage(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main> -->

    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">

        <!-- Page Heding -->
          <div class="page__heading">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                  <a href="/admin"
                    ><i class="material-icons icon-20pt">home</i></a
                  >
                </li>
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active" aria-current="page">
                  Product
                </li>
              </ol>
            </nav>

            <h1 class="m-0">Product</h1>
          </div>
          <!-- end heading -->

        </div>

        <!-- Content -->
        <div class="container page__container">
            <RouterLink to="/admin/products">
                <button class="btn btn-warning mb-4"> <i class="fa fa-arrow-left"></i> Back</button>
            </RouterLink>

            <div class="card">
              <div class="card-header">
                <form class="form-inline">
                  <label class="mr-sm-2" for="inlineFormFilterBy"
                    >Filter by:</label
                  >
                  <input
                    type="text"
                    class="form-control mb-2 mr-sm-2 mb-sm-0"
                    id="inlineFormFilterBy"
                    placeholder="Type a name"
                  />
                </form>
              </div>
  
              <div
                class="table-responsive border-bottom"
                data-toggle="lists"
                data-lists-values='["js-lists-values-employee-name"]'
              >
                <table class="table mb-0 thead-border-top-0" >
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Product Name</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="staff02">
                        <template v-if="images.length > 0">
                            <tr v-for="item in images" :key="item.id">
                                <td>{{ item.order }}</td>
                                <td>{{ item.product.name }}</td>
                                <td>
                                    <img :src="`/storage/${item.path}`" width="100" />
                                </td>
                                <td>
                                    <button class="btn btn-danger" @click="deleteImage(item.id)"><i class="fa fa-times"></i> Delete</button>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada foto produk</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
              </div>
  
              <!-- <div class="card-body text-right">
                15 <span class="text-muted">of 1,430</span>
                <a href="#" class="text-muted-light"
                  ><i class="material-icons ml-1">arrow_forward</i></a
                >
              </div> -->
            </div>
          </div>
        <!-- end Content -->

    </div>
</template>