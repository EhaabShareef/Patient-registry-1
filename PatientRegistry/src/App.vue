<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header class="bg-emerald-600 text-white py-4 px-12">
    <div class="container mx-auto flex-col items-center">
      <div class="flex">
        <h1 class="text-2xl font-bold">Patient Registry</h1>
      </div>
      <div>
        <nav class="flex space-x-4 mt-4">
          <RouterLink
            to="/"
            class="text-white hover:bg-emerald-700 p-2 rounded"
            active-class="font-bold bg-emerald-800"
          >
            Home
          </RouterLink>
          <RouterLink
            to="/patient"
            class="text-white hover:bg-emerald-700 p-2 rounded"
            active-class="font-bold bg-emerald-800"
          >
            About
          </RouterLink>
        </nav>
      </div>
    </div>
  </header>

  <main class="py-8 px-12">
    <RouterView />
  </main>
</template>
