import { createRouter, createWebHistory } from 'vue-router'

import DashboardView from '../views/admin/DashboardView.vue'
import AdminResellersView from '../views/admin/ResellersView.vue'
import AdminResellerEditView from '../views/admin/ResellerEditView.vue'
import AdminResellerDetailView from '../views/admin/ResellerDetailView.vue'
import AdminContactView from '../views/admin/ContactView.vue'
import AdminContactDetailView from '../views/admin/ContactDetailView.vue'
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
import AdminsProfileView from '../views/admin/AdminsProfileView.vue'
import UnauthorizedAccessView from '../views/admin/UnauthorizedAccessView.vue'
import ChangePasswordView from '../views/admin/ChangePasswordView.vue'
import AuthMiddleware from '../middleware/auth.js'
import SuperAdminMiddleware from '../middleware/superAdmin.js'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/admin',
            name: 'dashboard',
            component: DashboardView
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
        /* === RESELLER START === */
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
            component: AdminContactView
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
        /* === SUPER ADMIN START === */
        {
            path: '/admin/admins',
            name: 'admin.admins',
            component: AdminsView,
            meta: { requiresAuth: true, requiresSuperAdmin: true },
            beforeEnter: [AuthMiddleware, SuperAdminMiddleware]
        },
        {
            path: '/admin/admins/create',
            name: 'admin.admins.create',
            component: AdminsCreateView,
            meta: { requiresAuth: true, requiresSuperAdmin: true },
            beforeEnter: [AuthMiddleware, SuperAdminMiddleware]
        },
        {
            path: '/admin/admins/edit/:id',
            name: 'admin.admins.edit',
            component: AdminsEditView,
            props: true,
            meta: { requiresAuth: true, requiresSuperAdmin: true },
            beforeEnter: [AuthMiddleware, SuperAdminMiddleware]
        },
        /* === SUPER ADMIN END === */
        /* === PROFILE START === */
        {
            path: '/admin/profile',
            name: 'admin.profile',
            component: AdminsProfileView,
            meta: { requiresAuth: true },
            beforeEnter: AuthMiddleware
        },
        {
            path: '/admin/unauthorized',
            name: 'admin.unauthorized',
            component: UnauthorizedAccessView
        },
        /* === PROFILE END === */
        /* === UNAUTHORIZED PAGE === */
        {
            path: '/admin/changePassword/:id',
            name: 'admin.change_password',
            component: ChangePasswordView,
            props: true,
            meta: { requiresAuth: true },
            beforeEnter: AuthMiddleware
        }
        
    ]
})

export default router
