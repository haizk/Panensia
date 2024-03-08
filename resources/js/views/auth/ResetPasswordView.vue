<template>
    <div>
        <div style="margin-top: 100px; text-align: center;">
        <div v-if="successMessage" style="color: green;">
            {{ successMessage }}
        </div>
        <div v-if="errorMessage" style="color: red;">
            {{ errorMessage }}
        </div>
            <div style="margin: auto; width: 50%;">
                <div>
                    <h2>RESET PASSWORD</h2>
                    <hr >
                    <form @submit.prevent="resetPassword">
                        <div style="margin-bottom: 10px;">
                            <label>New Password:</label>
                            <input v-model="newPassword" type="password" style="width: 100%; padding: 5px;" required />

                            <label>Confirm New Password:</label>
                            <input v-model="confirmPassword" type="password" style="width: 100%; padding: 5px;" required />
                        </div>
                        
                        <button type="submit" style="padding: 5px; background-color: #3490dc; color: #fff; border: none; cursor: pointer;">RESET PASSWORD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';
import axios from 'axios';

const newPassword = ref('');
const confirmPassword = ref('');
const successMessage = ref('');
const errorMessage = ref('');
const props = defineProps(['token']);

const resetPassword = async () => {
    if (newPassword.value !== confirmPassword.value) {
        errorMessage.value = 'Passwords do not match.';
        return;
    }

    try {
        const response = await axios.post(`/api/resetPassword/${props.token}`, {
            password: newPassword.value,
            password_confirmation: confirmPassword.value,
        });

        // Handle response accordingly
        successMessage.value = response.data.message;
        errorMessage.value = '';
    } catch (error) {
        console.error(error);

        if (error.response) {
            errorMessage.value = error.response.data.message || 'Failed to change password.';
        } else {
            errorMessage.value = 'Failed to change password.';
        }

        successMessage.value = '';
    }
};
</script>
