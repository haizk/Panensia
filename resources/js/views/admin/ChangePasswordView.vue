<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AdminNavComp from '../../components/AdminNavComp.vue';
import AdminFooterComp from '../../components/AdminFooterComp.vue';

const newPassword = ref('');
const confirmPassword = ref('');
const changePasswordFailed = ref(false);
const router = useRouter();

const changePassword = async () => {
    if (newPassword.value !== confirmPassword.value) {
        changePasswordFailed.value = true;
        return;
    }

    try {
        const response = await axios.post(
            `/api/changePassword/${router.currentRoute.value.params.id}`,
            { password: newPassword.value, password_confirmation: confirmPassword.value },
            {
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                },
            }
        );
        console.log(response.data);
        alert('Password changed');
        router.push({ name: 'admin.profile' });
    } catch (error) {
        changePasswordFailed.value = true;
    }
};
</script>

<template>
  <div>
    <header>
      <AdminNavComp />
    </header>
    <main>
      <div>
        <div v-if="changePasswordFailed" style="color: red;">
          Passwords do not match.
        </div>
        <h2>Change Password</h2>
        <form @submit.prevent="changePassword">
          <label>New Password:</label>
          <input v-model="newPassword" type="password" name="password" required />
          <br>
          <label>Confirm New Password:</label>
          <input v-model="confirmPassword" type="password" name="password_confirmation" required />
          <br>
          <button type="submit">Change Password</button>
        </form>
      </div>
    </main>
    <AdminFooterComp />
  </div>
</template>
