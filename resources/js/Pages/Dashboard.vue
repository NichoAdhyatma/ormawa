<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #title>
            Dashboard OrmawaPENS
        </template>

        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome :username="$page.props.user.name" />
                </div>
            </div>
        </main>
    </AppLayout>
</template>
