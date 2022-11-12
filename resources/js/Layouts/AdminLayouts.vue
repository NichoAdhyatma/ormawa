<script setup>
import { ref } from 'vue';

const theme = ref('light');

if (localStorage.getItem("theme")) {
    theme.value = localStorage.getItem('theme')
}

const handleTheme = () => {
    if (theme.value == 'light') {
        localStorage.setItem('theme', 'dark');
        theme.value = 'dark'
    }
    else {
        localStorage.setItem('theme', 'light')
        theme.value = 'light'
    }
}
</script>

<template>
  <div :data-theme="theme">
    <main class="max-w-7xl min-h-screen">
      <slot/>
    </main>
  </div>
</template>