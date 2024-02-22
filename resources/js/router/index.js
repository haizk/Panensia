import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import BeritaView from '../views/BeritaView.vue'
import ContactView from '../views/ContactView.vue'
import BeritaDetail from '../views/BeritaDetail.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/about',
            name: 'about',
            component: AboutView
        },
        {
            path: '/berita',
            name: 'berita',
            component: BeritaView
        },
        {
            path: '/kontak',
            name: 'kontak',
            component: ContactView
        },
        {
            path: '/detailberita',
            name: 'beritadetail',
            component: BeritaDetail
        }
    ]
})

export default router
