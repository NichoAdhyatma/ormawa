<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-base-100 border border-gray-300 rounded-md font-semibold text-xs text-base-content uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-base-100 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
