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
            <div data-aos="fade-left" data-aos-duration>
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center justify-center pt-8 pb-5 sm:justify-start sm:pt-0">
                        <h1 class="text-2xl">
                            <ApplicationMark />
                        </h1>
                    </div>

                    <div class="bg-base-200 grid grid-cols-1 lg:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                                    <path
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a href="https://laravel.com/docs">Himpunan Mahasiswa (HIMA)</a>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether
                                    you're
                                    new
                                    to the framework or have previous experience, we recommend reading all of the
                                    documentation
                                    from
                                    beginning to end.
                                </div>

                                <a href="https://laravel.com/docs">
                                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>Explore more</div>

                                        <div class="ml-1 text-indigo-500">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="p-6 border-t border-base-300 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                                    <path
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div class="ml-4 text-l leading-7 font-semibold">
                                    <a href="https://laracasts.com">Badan Eksekutif Mahasiswa (BEM)</a>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                                    development.
                                    Check
                                    them out, see for yourself, and massively level up your development skills in the
                                    process.
                                </div>

                                <a href="https://laracasts.com">
                                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>Start Journey</div>

                                        <div class="ml-1 text-indigo-500">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="p-6 border-t border-base-300">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a href="https://tailwindcss.com/">Unit Kegiatan Mahasiswa (UKM) </a>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm">
                                    Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework
                                    that
                                    doesn't
                                    get in your way. You'll be amazed how easily you can build and maintain fresh,
                                    modern
                                    designs
                                    with this wonderful framework at your fingertips.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-base-300 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                                    <path
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Komunitas
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm">
                                    Authentication and registration views are included with Laravel Jetstream, as well
                                    as
                                    support
                                    for user email verification and resetting forgotten passwords. So, you're free to
                                    get
                                    started
                                    what matters most: building your application.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                        <div class="text-center text-sm text-gray-500 sm:text-left">
                            <div class="flex items-center">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>

                                <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                    Merchandise
                                </a>

                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                    <path
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>

                                <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                    Sponsor
                                </a>
                            </div>
                        </div>

                        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </PageLayout>
</template>
