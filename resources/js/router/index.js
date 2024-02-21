import { createRouter, createWebHistory } from 'vue-router'
import userRouter from './user'
import adminRouter from './admin'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [...userRouter.options.routes, ...adminRouter.options.routes]
})

export default router
