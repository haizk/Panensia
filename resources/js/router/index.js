import { createRouter, createWebHistory } from 'vue-router'
// import HomeView from '../views/HomeView.vue'
// import AboutView from '../views/AboutView.vue'
// import BeritaView from '../views/BeritaView.vue'
// import ContactView from '../views/ContactView.vue'
// import BeritaDetail from '../views/BeritaDetail.vue'
// import Produk from '../views/ProdukView.vue'
// import ProdukDetail from '../views/ProdukDetailView.vue'
import userRouter from './user'
import adminRouter from './admin'
import authRouter from './auth'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    // routes: [
    //     {
    //         path: '/',
    //         name: 'home',
    //         component: HomeView
    //     },
    //     {
    //         path: '/tentangKami',
    //         name: 'tentang',
    //         component: AboutView
    //     },
    //     {
    //         path: '/berita',
    //         name: 'berita',
    //         component: BeritaView
    //     },
    //     {
    //         path: '/kontak',
    //         name: 'kontak',
    //         component: ContactView
    //     },
    //     {
    //         path: '/detailberita',
    //         name: 'beritadetail',
    //         component: BeritaDetail
    //     },
    //     {
    //         path: '/detailproduk',
    //         name: 'detailproduk',
    //         component: ProdukDetail
    //     },
    //     {
    //         path: '/produk',
    //         name: 'produk',
    //         component: Produk
    //     }
    // ],
    routes: [
        ...userRouter.options.routes,
        ...adminRouter.options.routes,
        ...authRouter.options.routes
    ]
})

export default router
