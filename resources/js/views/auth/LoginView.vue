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
                            <hr />
                            <form @submit.prevent="login">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        v-model="user.email"
                                        placeholder="Masukkan Email"
                                    />
                                    <div
                                        v-if="validation.email"
                                        class="mt-2 alert alert-danger"
                                    >
                                        Masukkan Email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        v-model="user.password"
                                        placeholder="Masukkan Password"
                                    />
                                    <div
                                        v-if="validation.password"
                                        class="mt-2 alert alert-danger"
                                    >
                                        Masukkan Password
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    LOGIN
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const loggedIn = ref(localStorage.getItem('loggedIn'));  // Tambahkan ini
const user = ref({ email: '', password: '' });
const validation = ref({ email: false, password: false });
const loginFailed = ref(null);
const router = useRouter();

const login = async () => {
    validation.value = { email: false, password: false };

    if (!user.value.email) {
        validation.value.email = true;
        return;
    }

    if (!user.value.password) {
        validation.value.password = true;
        return;
    }

    try {
        await axios.get('http://localhost:8000/sanctum/csrf-cookie');
        const response = await axios.post('http://localhost:8000/api/login', {
            email: user.value.email,
            password: user.value.password
        });

        if (response.data.success) {
            localStorage.setItem('loggedIn', 'true');
            localStorage.setItem('token', response.data.token);
            router.push({ name: 'dashboard' });
            
            // Pastikan memanggil getLoggedIn setelah melakukan router.push
            getLoggedIn();
        } else {
            loginFailed.value = true;
        }
    } catch (error) {
        console.error(error);
    }
};

// Fungsi untuk mendapatkan nilai loggedIn dari localStorage
const getLoggedIn = () => {
    loggedIn.value = localStorage.getItem('loggedIn');
};
</script>
