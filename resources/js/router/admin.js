import { createRouter, createWebHistory } from 'vue-router'

import DashboardView from '../views/admin/DashboardView.vue'
import AdminNewsView from '../views/admin/NewsView.vue'
import AdminNewsEditView from '../views/admin/NewsEditView.vue'
import AdminNewsCreateView from '../views/admin/NewsCreateView.vue'
import AdminNewsCategoriesView from '../views/admin/NewsCategoriesView.vue'
import AdminNewsCategoriesCreateView from '../views/admin/NewsCategoriesCreateView.vue'
import AdminNewsCategoriesEditView from '../views/admin/NewsCategoriesEditView.vue'
import AdminResellersView from '../views/admin/ResellersView.vue'
import AdminResellerEditView from '../views/admin/ResellerEditView.vue'
import AdminResellerDetailView from '../views/admin/ResellerDetailView.vue'
import AdminContactsView from '../views/admin/ContactsView.vue'
import AdminContactDetailView from '../views/admin/ContactDetailView.vue'
import AdminProductsView from '../views/admin/ProductsView.vue'
import AdminProductEditView from '../views/admin/ProductEditView.vue'
import AdminProductCreateView from '../views/admin/ProductCreateView.vue'
import AdminsView from '../views/admin/AdminsView.vue'
import AdminsCreateView from '../views/admin/AdminsCreateView.vue'
import AdminsEditView from '../views/admin/AdminsEditView.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/admin',
            name: 'dashboard',
            component: DashboardView,
            meta: {
                requiresAuth: true
            }
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
        },
        {
            path: '/admin/news_categories',
            name: 'admin.news_categories',
            component: AdminNewsCategoriesView
        },
        {
            path: '/admin/news_categories/create',
            name: 'admin.news_categories.create',
            component: AdminNewsCategoriesCreateView
        },
        {
            path: '/admin/news_categories/edit/:id',
            name: 'admin.news_categories.edit',
            component: AdminNewsCategoriesEditView,
            props: true
        },
        {
            path: '/admin/resellers',
            name: 'admin.resellers',
            component: AdminResellersView
        },
        {
            path: '/admin/reseller/:id',
            name: 'admin.reseller.detail',
            component: AdminResellerDetailView
        },
        {
            path: '/admin/reseller/edit/:id',
            name: 'admin.reseller.edit',
            component: AdminResellerEditView,
            props: true
        },
        {
            path: '/admin/contacts',
            name: 'admin.contacts',
            component: AdminContactsView
        },
        {
            path: '/admin/contacts/:id',
            name: 'admin.contacts.detail',
            component: AdminContactDetailView
        },
        {
            path: '/admin/products',
            name: 'admin.products',
            component: AdminProductsView
        },
        {
            path: '/admin/product/create',
            name: 'admin.product.create',
            component: AdminProductCreateView
        },
        {
            path: '/admin/product/edit/:id',
            name: 'admin.product.edit',
            component: AdminProductEditView,
            props: true
        },
        {
            path: '/admin/admins',
            name: 'admin.admins',
            component: AdminsView,
            meta: { requiresSuperAdmin: true },
        },
        {
            path: '/admin/admins/create',
            name: 'admin.admins.create',
            component: AdminsCreateView,
        },
        {
            path: '/admin/admins/edit/:id',
            name: 'admin.admins.edit',
            component: AdminsEditView,
            props: true
        }
    ]
})

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('loggedIn');
    
    if (to.matched.some(record => record.meta.requiresSuperAdmin)) {
        if (loggedIn && localStorage.getItem('is_superAdmin') === '1') {
        next();
        } else {
        next({ name: 'login' });
        }
    } else {
        next();
    }
});

export default router
