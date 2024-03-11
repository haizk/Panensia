import { createRouter, createWebHistory } from 'vue-router'

import DashboardView from '../views/admin/DashboardView.vue'
import AdminShopsView from '../views/admin/ShopsView.vue'
import AdminShopsEditView from '../views/admin/ShopsEditView.vue'
import AdminShopsCreateView from '../views/admin/ShopsCreateView.vue'
import AdminContactsView from '../views/admin/ContactsView.vue'
import AdminProductsView from '../views/admin/ProductsView.vue'
import AdminProductImagesView from '../views/admin/ProductImagesView.vue'
import AdminProductEditView from '../views/admin/ProductEditView.vue'
import AdminProductCreateView from '../views/admin/ProductCreateView.vue'
import AdminProductCategoriesView from '../views/admin/ProductCategoryView.vue'
import AdminProductCategoryEditView from '../views/admin/ProductCategoryEditView.vue'
import AdminProductCategoryCreateView from '../views/admin/ProductCategoryCreateView.vue'
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
        /* === NEWS START === */
        {
            path: '/admin/news',
            name: 'admin.news',
            component: () => import('../views/admin/NewsView.vue')
        },
        {
            path: '/admin/news/create',
            name: 'admin.news.create',
            component: () => import('../views/admin/NewsCreateView.vue')
        },
        {
            path: '/admin/news/edit/:id',
            name: 'admin.news.edit',
            component: () => import('../views/admin/NewsEditView.vue'),
            props: true
        },
        {
            path: '/admin/news_categories',
            name: 'admin.news_categories',
            component: () => import('../views/admin/NewsCategoriesView.vue')
        },
        {
            path: '/admin/news_categories/create',
            name: 'admin.news_categories.create',
            component: () => import('../views/admin/NewsCategoriesCreateView.vue')
        },
        {
            path: '/admin/news_categories/edit/:id',
            name: 'admin.news_categories.edit',
            component: () => import('../views/admin/NewsCategoriesEditView.vue'),
            props: true
        },
        {
            path: '/admin/news_images/edit/:id',
            name: 'admin.news_images.edit',
            component: () => import('../views/admin/NewsImagesEditView.vue'),
            props: true
        },
        /* === NEWS END === */
        /* === SHOPS START === */
        {
            path: '/admin/shops',
            name: 'admin.shops',
            component: AdminShopsView
        },
        {
            path: '/admin/shops/:id',
            name: 'admin.shops.detail',
            component: () => import('../views/admin/ShopDetailView.vue')
        },
        {
            path: '/admin/shops/create',
            name: 'admin.shops.create',
            component: AdminShopsCreateView
        },
        {
            path: '/admin/shops/edit/:id',
            name: 'admin.shops.edit',
            component: AdminShopsEditView,
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
            component: () => import('../views/admin/ContactDetailView.vue') // Sesuaikan dengan path yang benar
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
            path: '/admin/product_categories',
            name: 'admin.product_categories',
            component: AdminProductCategoriesView
        },
        {
            path: '/admin/product_categories/create',
            name: 'admin.product_categories.create',
            component: AdminProductCategoryCreateView
        },
        {
            path: '/admin/product_categories/edit/:id',
            name: 'admin.product_categories.edit',
            component: AdminProductCategoryEditView,
            props: true
        },
        {
            path: '/admin/product_images/:id',
            name: 'admin.product_images',
            component: AdminProductImagesView,
            props: true
        },
        {
            path: '/admin/admins',
            name: 'admin.admins',
            component: AdminsView,
            meta: { requiresSuperAdmin: true }
        },
        {
            path: '/admin/admins/create',
            name: 'admin.admins.create',
            component: AdminsCreateView
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
        next()
    }
})

export default router
