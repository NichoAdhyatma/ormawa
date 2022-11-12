<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import PageLayout from '@/Layouts/PageLayout.vue';
import ApplicationMark from '../Components/ApplicationMark.vue';

defineProps({
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>

    <Head title="Welcome" />
    <PageLayout>
        <main>
            <div class="flex flex-col lg:flex-row items-center px-6 lg:px-8">
                <div>
                    <img src="/asset/landing-img.png" alt="img-landing" class="w-75 sm:w-100">
                </div>
                <div class="flex flex-col items-start justify-start">
                    <h1 class="text-2xl sm:text-5xl text-center">
                        <ApplicationMark />
                    </h1>
                    <p class="opacity-75">Website Resmi Organisasi Mahasiwa</p>
                    <p class="class pt-12 pb-5 text-bold text-2xl">Politeknik Elektronika Negeri Surabaya</p>

                    <p class="pb-3 text-blue-600 text-bold">Jika belum memiliki akun <Strong>Daftar</Strong> terlebih
                        dahulu</p>
                    <div class="flex gap-4 items-center">
                        <div class="btn-primary rounded px-4 py-1 text-xl cursor-pointer">Login</div>
                        <div class="text-primary font-bold text-xl cursor-pointer">Register</div>
                    </div>
                </div>
            </div>
        </main>
    </PageLayout>
</template>
