<script setup>
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const performLogout = () => {
localStorage.removeItem('loggedIn')
    localStorage.removeItem('token')
    // loggedIn.value = false
    
    // Redirect to login page
    router.push({ name: 'login' })
}

onMounted(() => {
    performLogout()
})
</script>