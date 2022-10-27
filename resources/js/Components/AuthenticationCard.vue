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
    <div :data-theme="theme" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-base-200 shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
