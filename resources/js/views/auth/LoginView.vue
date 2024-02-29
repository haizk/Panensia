<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const loggedIn = ref(localStorage.getItem('loggedIn'))
const user = ref([])
const validation = ref([])
const loginFailed = ref(null)

const login = () => {
    if (user.value.email && user.value.password) {
        axios.get('http://localhost:8000/sanctum/csrf-cookie')
            .then(response => {
                console.log(response)
                axios.post('http://localhost:8000/api/login', {
                    email: user.value.email,
                    password: user.value.password
                }).then(res => {
                    console.log(res)
                    if (res.data.success) {
                        localStorage.setItem("loggedIn", "true")
                        localStorage.setItem("token", res.data.token)
                        loggedIn.value = true
                        router.push({ name: 'dashboard' })
                    } else {
                        loginFailed.value = true
                    }
                }).catch(error => {
                    console.error(error)
                })
            })
    }

    validation.value = []

    if (!user.value.email) {
        validation.value.email = true
    }

    if (!user.value.password) {
        validation.value.password = true
    }
}

const router = useRouter()

onMounted(() => {
    if (loggedIn.value) {
        router.push({ name: 'dashboard' })
    }
})
</script>

<template>
    <div class="login">
        <div class="container" style="margin-top:100px">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div v-if="loginFailed" class="alert alert-danger">
                        Email atau Password Anda salah.
                    </div>
                    <div class="card">
                        <div class="card-body">
                            LOGIN
                            <hr>
                            <form @submit.prevent="login">

                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" class="form-control" v-model="user.email"
                                        placeholder="Masukkan Email">
                                    <div v-if="validation.email" class="mt-2 alert alert-danger">
                                        Masukkan Email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="password" class="form-control" v-model="user.password"
                                        placeholder="Masukkan Password">
                                    <div v-if="validation.password" class="mt-2 alert alert-danger">
                                        Masukkan Password
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
