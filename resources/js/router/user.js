import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import NewsView from '../views/user/NewsView.vue'
import NewsDetailView from '../views/user/NewsDetailView.vue'
import ContactsView from '../views/user/ContactsView.vue'
import ResellerView from '../views/user/ResellerView.vue'
import Produk from '../views/ProdukView.vue'
import ProdukDetail from '../views/ProdukDetailView.vue'

const userRouter = createRouter({
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
            path: '/news',
            name: 'news',
            component: NewsView
        },
        {
            path: '/news/detail/:id',
            name: 'news.detail',
            component: NewsDetailView,
            props: true
        },
        {
            path: '/:pathMatch(.*)*',
            redirect: { name: 'home' }
        },
        {
            path: '/contact',
            name: 'contacts.create',
            component: ContactsView
        },
        {
            path: '/reseller',
            name: 'reseller.create',
            component: ResellerView
        },
        {
            path: '/produk',
            name: 'produk',
            component: Produk
        },
        {
            path: '/produk/detail/:id',
            name: 'produk.detail',
            component: ProdukDetail,
            props: true
        }
    ]
})

export default userRouter
