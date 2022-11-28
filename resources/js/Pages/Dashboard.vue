<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

</script>

<template>
    <AppLayout title="Dashboard">
        <template #title>
            Dashboard Mahasiswa OrmawaPENS
        </template>

        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="alert alert-success shadow-lg mb-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Logged in</span>
                            <span>
                                {{ $page.props.user.name}}
                            
                            </span>
                        </div>
                    </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <Welcome :username="$page.props.user.name" />
                </div>
            </div>
        </main>
    </AppLayout>
</template>
