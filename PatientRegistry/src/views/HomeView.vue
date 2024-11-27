<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';

// Form data for the combined patient and address information
const formData = ref({
  name: '',
  date_of_birth: '',
  national_id: '',
  address: {
    island_id: '',
    street: '',
    city: '',
    house_name: ''
  }
});

// Define the API base URL (you can replace this with your actual backend URL)
const apiUrl = 'https://localhost:8000/api'; // Change this to your backend URL

// Axios client instance
const apiClient = axios.create({
  baseURL: apiUrl,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Submit handler for the form (Patient + Address)
const submitForm = async () => {
  try {
    // Send combined form data (patient + address) to the backend
    const response = await apiClient.post('/patients', formData.value);
    console.log('Form Submitted:', response.data);

    // You can display a success message or redirect the user
    alert('Patient and address information saved successfully');

    // Optionally, clear the form fields after submission
    formData.value = {
      name: '',
      date_of_birth: '',
      national_id: '',
      address: {
        island_id: '',
        street: '',
        city: '',
        house_name: ''
      }
    };
  } catch (error) {
    console.error('Error submitting form:', error);
    alert('There was an error submitting the data');
  }
};
</script>

<template>
  <div class=" bg-gray-100 flex items-center justify-center p-6 rounded-lg">
    <div class="bg-white shadow rounded-lg w-full max-w-md p-6">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Patient Information</h2>
      <form @submit.prevent="submitForm" class="space-y-4">
        <!-- Personal Information -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input
            type="text"
            id="name"
            v-model="formData.name"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter your name"
            required
          />
        </div>

        <div>
          <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
          <input
            type="date"
            id="date_of_birth"
            v-model="formData.date_of_birth"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            required
          />
        </div>

        <div>
          <label for="national_id" class="block text-sm font-medium text-gray-700">National ID</label>
          <input
            type="text"
            id="national_id"
            v-model="formData.national_id"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter your National ID"
            required
          />
        </div>

        <!-- Address Information -->
        <h3 class="text-xl font-semibold text-gray-800">Address Information</h3>
        <div>
          <label for="island_id" class="block text-sm font-medium text-gray-700">Island ID</label>
          <input
            type="text"
            id="island_id"
            v-model="formData.address.island_id"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter Island ID"
            required
          />
        </div>

        <div>
          <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
          <input
            type="text"
            id="street"
            v-model="formData.address.street"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter Street Name"
            required
          />
        </div>

        <div>
          <label for="city" class="block text-sm font-medium text-gray-700">City</label>
          <input
            type="text"
            id="city"
            v-model="formData.address.city"
            class="mt-1 py-2 px-3 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter City"
            required
          />
        </div>

        <div>
          <label for="house_name" class="block text-sm font-medium text-gray-700">House Name</label>
          <input
            type="text"
            id="house_name"
            v-model="formData.address.house_name"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Enter House Name"
            required
          />
        </div>

        <button
          type="submit"
          class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
        >
          Submit
        </button>
      </form>
    </div>
  </div>
</template>
