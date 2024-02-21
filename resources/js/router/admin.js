import { createRouter, createWebHistory } from 'vue-router'

import DashboardView from '../views/admin/DashboardView.vue'
import AdminNewsView from '../views/admin/NewsView.vue'
import AdminNewsEditView from '../views/admin/NewsEditView.vue'
import AdminNewsCreateView from '../views/admin/NewsCreateView.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/admin',
            name: 'dashboard',
            component: DashboardView
            // meta: {
            //     requiresAuth: true
            // }
        },
        {
            path: '/admin/news',
            name: 'admin.news',
            component: AdminNewsView
        },
        {
            path: '/admin/news/create',
            name: 'admin.news.create',
            component: AdminNewsCreateView
        },
        {
            path: '/admin/news/edit/:id',
            name: 'admin.news.edit',
            component: AdminNewsEditView,
            props: true
        }
    ]
})

export default router
