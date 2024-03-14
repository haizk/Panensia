<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'

// let shops = ref([])
let product_categories = ref([])
let name = ref('')
let desc = ref('')
let ingredient = ref('')
let caution = ref('')
let product_category_id = ref('')
// let shop_id = ref('')
let link_shopee = ref('')
let link_tokped = ref('')
let link_tiktok = ref('')
let files = ref(null)
const router = useRouter()

onMounted(async () => {
    const response = await axios.get('/api/getProductCategories')
    product_categories.value = response.data.categories
    console.log(product_categories)
})

const createProduct = async () => {
    // Add validation / CSRF token

    const formData = new FormData()
    formData.append('name', name.value)
    formData.append('desc', desc.value)
    formData.append('ingredient', ingredient.value)
    formData.append('caution', caution.value)
    // formData.append('shop_id', shop_id.value)
    formData.append('product_category_id', product_category_id.value)
    formData.append('link_tokped', link_tokped.value)
    formData.append('link_shopee', link_shopee.value)
    formData.append('link_tiktok', link_tiktok.value)

    if (files.value) {
        for (let i = 0; i < files.value.length; i++) {
            formData.append(`files[${i}]`, files.value[i])
        }
    }

    try {
        const response = await axios.post('/api/createProduct', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        console.log(response.data)
        alert('Product created')
        router.push('/admin/products')
    } catch (error) {
        console.error(error.response.data)
        alert('Error creating news')
    }
}
</script>

<template>
    <!-- <main>
        <h1>Admin Create News</h1>
        <p>name</p>
        <input type="text" v-model="name" />
        <p>desc</p>
        <textarea v-model="desc"></textarea>
        <p>desc</p>
        <textarea v-model="ingredient"></textarea>
        <p>desc</p>
        <textarea v-model="caution"></textarea>
        <p>category</p>
        <select v-if="product_categories.length > 0" v-model="product_category_id">
            <option v-for="item in product_categories" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <p v-else>No category</p>
        <p>files</p>
        <input type="file" multiple @change="files = $event.target.files" />
        <p>link_shopee</p>
        <input type="text" v-model="link_shopee" />
        <p>link_tokped</p>
        <input type="text" v-model="link_tokped" />
        <p>link_tiktok</p>
        <input type="text" v-model="link_tiktok" />
        <button @click="createProduct()">Create</button>
    </main> -->
    <div class="mdk-drawer-layout__content page">
      <div class="container-fluid page__heading-container">

      <!-- Page Heding -->
        <div class="page__heading">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="/admin">
                  <i class="material-icons icon-20pt">home</i>
                </a>
              </li>
              <li class="breadcrumb-item">Management</li>
              <li class="breadcrumb-item">
                <a href="/admin/products">
                  Product
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Create
              </li>
            </ol>
          </nav>

          <h1 class="m-0">Create Product</h1>
        </div>
        <!-- end heading -->

      </div>

      <!-- Content -->
      <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-12 card-form__body card-body">
                      <div class="form-row">
                          <div class="col-12 col-md-12 mb-3">
                              <label for="validationSample01">Product Name</label>
                              <input type="text" class="form-control" id="validationSample01" placeholder="First name" required="" v-model="name">
                              
                          </div>
                          <div class="col-12 col-md-12 mb-3">
                              <label for="validationSample02">Product Description</label>
                              <textarea v-model="desc" name="" class="form-control" id="validationSample02" cols="30" rows="3" required=""></textarea>
                              
                          </div>
                          <div class="col-12 col-md-12 mb-3">
                            <label for="validationSample02">Product Ingredients</label>
                            <textarea v-model="ingredient" name="" class="form-control" id="validationSample02" cols="30" rows="3" required=""></textarea>
                            
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                          <label for="validationSample02">Product Caution</label>
                          <textarea v-model="caution" name="" class="form-control" id="validationSample02" cols="30" rows="3" required=""></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="select01">Product Category</label>
                    <select id="select01" v-if="product_categories.length > 0" v-model="product_category_id" data-toggle="select" class="form-control">
                      <option value="" disabled>Select a category</option>
                      <option v-for="item in product_categories" :key="item.id" :value="item.id">
                          {{ item.name }}
                      </option>
                  </select>
                  <p v-else>No category</p>
                </div>
                <div class="form-group">
                  <label for="dropfile">Images</label>
                  <input type="file" class="form-control" id="dropfile" multiple @change="files = $event.target.files">
                </div>
            
                <ul id="file-list">
                  <li v-if="fileList.length === 0">Tidak ada file</li>
                  <li v-else v-for="file in fileList" :key="file.name">
                    <img :src="getFileUrl(file)" alt="" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                    {{ file.name }}
                  </li>
                </ul>

                <div class="form-group">
                    <div class="col-12 col-md-12 mb-3">
                      <label for="validationSample04">Link Shopee</label>
                      <input v-model="link_shopee" type="text" class="form-control" id="validationSample04" placeholder="https://shopee.co.id/.." required="">
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                      <label for="validationSample05">Link Tokopedia</label>
                      <input v-model="link_tokped" type="text" class="form-control" id="validationSample05" placeholder="https://www.tokopedia.com/.." required="">
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                      <label for="validationSample06">Link Tiktop Shop</label>
                      <input v-model="link_tiktok" type="text" class="form-control" id="validationSample06" placeholder="https://vt.tokopedia.com/.." required="">
                    </div>
                </div>
                  <button @click="createProduct()" class="btn btn-primary">Create Product</button>
            </div>
        </div>
    </div>
      <!-- end Content -->

  </div>
</template>

<script>
  export default {
    data() {
      return {
        fileList: []
      };
    },
    methods: {
      handleFiles(event) {
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
          const file = files[i];
          // Validate file type
          if (file.type.startsWith('image/')) {
            this.fileList.push(file);
          } else {
            alert('File harus berupa gambar');
          }
        }
      },
      getFileUrl(file) {
        return URL.createObjectURL(file);
      }
    }
  };
</script>
