<template>
    <div>
        <div style="margin-top: 100px; text-align: center;">
        <div v-if="resetFailed" style="color: red;">
            Email Anda tidak terdaftar.
        </div>
        <div v-if="resetEmailSentSuccess" style="color: green;">
            Kami telah mengirimkan tautan reset password ke email Anda.
        </div>
        <div style="margin: auto; width: 50%;">
            <div>
            <h2>PASSWORD RESET</h2>
            <hr />
            <form @submit.prevent="reset">
                <div style="margin-bottom: 10px;">
                <label>EMAIL</label>
                <input
                    type="email"
                    style="width: 100%; padding: 5px;"
                    v-model="user.email"
                    placeholder="Masukkan Email"
                />
                <div v-if="validation.email" style="color: red; margin-top: 5px;">
                    Masukkan Email
                </div>
                </div>

                <button type="submit" style="padding: 5px; background-color: #3490dc; color: #fff; border: none; cursor: pointer;">
                RESET PASSWORD
                </button>
            </form>
            </div>
            <div>
                <RouterLink to="/login">Return to Login</RouterLink>
            </div>
        </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const user = ref({ email: '' });
const validation = ref({ email: false });
const resetFailed = ref(false);
const resetEmailSentSuccess = ref(false);

const reset = async () => {
    validation.value = { email: false };

    if (!user.value.email) {
        validation.value.email = true;
        return;
    }

    try {
        const response = await axios.post('/api/sendResetPasswordEmail', {
            email: user.value.email,
        });
        console.log(response.data);

        if (response.data.status === 'success') {
            resetEmailSentSuccess.value = true;
        } else {
            resetFailed.value = true;
        }
    } catch (error) {
        console.error(error);
        resetFailed.value = true;
    }
};
</script>
