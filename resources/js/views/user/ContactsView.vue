<template>
  <header>
    <NavComp />
  </header>
  <main>
    <div>
        <h2>Create Contact</h2>

        <!-- Form for Creating Contact -->
        <form @submit.prevent="saveContact">
            <!-- Add form fields for creating a contact -->
            <label>Name: </label>
            <input v-model="contactForm.name" required>

            <label>Email: </label>
            <input v-model="contactForm.email" required>

            <!-- Dropdown for Contact Type (Keluhan, Saran) -->
            <label>Type: </label>
            <select v-model="contactForm.type" required>
                <option value="keluhan">keluhan</option>
                <option value="saran">saran</option>
            </select>

            <!-- Additional field for Message -->
            <label>Message: </label>
            <textarea v-model="contactForm.message" required></textarea>

            <button type="submit">Save</button>

            <!-- Tampilkan pesan sukses jika sukses -->
            <div v-if="successMessage" class="success-message">{{ successMessage }}</div>
        </form>
    </div>
  </main>
  <footer>
    <FooterComp />
  </footer>
  </template>
  
  <script>
  import NavComp from '../../components/NavComp.vue'
  import FooterComp from '../../components/FooterComp.vue'

  export default {
    components: {
      NavComp,
      FooterComp,
    },
    data() {
        return {
            contactForm: {
                name: '',
                email: '',
                type: 'keluhan', // Default to 'keluhan'
                message: '',
            },
            successMessage: '',
        };
    },
    methods: {
      async saveContact() {
            try {
                const response = await fetch('/api/contacts', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(this.contactForm),
                });

                if (response.ok) {
                    // Redirect or perform any other action after successful contact creation
                    this.$router.push({ name: 'contacts.create' });
                    this.successMessage = 'Contact saved successfully!';
                    this.contactForm = {
                      name: '',
                      email: '',
                      type: 'keluhan', // Default to 'keluhan'
                      message: '',
                    };
                } else {
                    console.error('Failed to create contact:', response.statusText);
                }
            } catch (error) {
                console.error('Error creating contact:', error);
            }
        },
    },
  };
  </script>
  