<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';

const apiUrl = 'https://localhost:8000'; // backend URL

// axios
const apiClient = axios.create({
  baseURL: apiUrl,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Patients data
const patients = ref<any[]>([]);

// Fetch all patients from the backend
const fetchPatients = async () => {
  try {
    const response = await apiClient.get('/api/patients');
    patients.value = response.data.data;
  } catch (error) {
    console.error('Error fetching patients:', error);
  }
};

// Call the fetchPatients function when the component is mounted
onMounted(() => {
  fetchPatients();
});
</script>

<template>
  <div class="min-h-screen bg-gray-100 py-10 rounded-lg">
    <div class="max-w-8xl mx-auto px-4">
      <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Patient Records</h2>
        <table class="table-auto w-full border-collapse">
          <thead>
            <tr class="bg-green-600 text-white">
              <th class="px-4 py-2">Name</th>
              <th class="px-4 py-2">Date of Birth</th>
              <th class="px-4 py-2">National ID</th>
              <th class="px-4 py-2">Island ID</th>
              <th class="px-4 py-2">Street</th>
              <th class="px-4 py-2">City</th>
              <th class="px-4 py-2">House Name</th>
            </tr>
          </thead>
          <tbody>
            <tr 
              v-for="patient in patients" 
              :key="patient.id" 
              class="hover:bg-gray-100">
              <td class="px-4 py-2">{{ patient.name }}</td>
              <td class="px-4 py-2">{{ patient.date_of_birth }}</td>
              <td class="px-4 py-2">{{ patient.national_id }}</td>
              <td class="px-4 py-2">{{ patient.address.island_id }}</td>
              <td class="px-4 py-2">{{ patient.address.street }}</td>
              <td class="px-4 py-2">{{ patient.address.city }}</td>
              <td class="px-4 py-2">{{ patient.address.house_name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
