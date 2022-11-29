<script setup>
import { ref } from 'vue';

const theme = ref('light');

if (localStorage.getItem("theme")) {
  theme.value = localStorage.getItem('theme')
}

const handleTheme = () => {
  if (theme.value == 'light') {
    localStorage.setItem('theme', 'night');
    theme.value = 'night'
  }
  else {
    localStorage.setItem('theme', 'light')
    theme.value = 'light'
  }
}

</script>

<template>
  <!-- component -->
  <main :data-theme="theme" class="min-h-screen">
    <div class="max-w-7xl  flex justify-center">
      <p>Login</p>
    </div>
  </main>
</template>
