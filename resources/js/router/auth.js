import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '../views/auth/LoginView.vue'
import ForgotPasswordView from '../views/auth/ForgotPasswordView.vue'
import ResetPasswordView from '../views/auth/ResetPasswordView.vue'

const loginRouter = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginView
        },
        {
            path: '/forgotPassword',
            name: 'forgotPassword',
            component: ForgotPasswordView,
        },
        {
            path: '/resetPasswordForm/:token',
            name: 'resetPasswordForm',
            component: ResetPasswordView,
            props: true,
        },
    ]
})


export default loginRouter
