import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '../views/auth/LoginView.vue'
import ForgotPasswordView from '../views/auth/ForgotPasswordView.vue'
import ResetPasswordView from '../views/auth/ResetPasswordView.vue'

const loginRouter = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/login',
            name: 'auth.login',
            component: LoginView
        },
        {
            path: '/forgotPassword',
            name: 'auth.forgot_password',
            component: ForgotPasswordView,
        },
        {
            path: '/resetPasswordForm/:token',
            name: 'auth.reset_password_form',
            component: ResetPasswordView,
            props: true,
        },
    ]
})


export default loginRouter
