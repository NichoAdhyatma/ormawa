<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    title: String,
});

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

const logout = () => {
    Inertia.post(route('logout'));
};


</script>
<template>
    <div :data-theme="theme">
        <div class="bg-base-100 flex items-center justify-center min-h-full">

            <Head :title="title" />
            <div class="bg-base-200 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 sm:p-6">
                <!-- Navigation -->
                <div
                    class="bg-base-300 z-10 px-2 lg:px-4 py-2 lg:py-10 sm:rounded-r-xl flex lg:flex-col justify-between fixed top-0 min-w-full sm:static sm:min-w-0 lg:fixed lg:left-0 lg:min-w-0 lg:min-h-screen">
                    <nav class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">

                        <Link :class="{ 'text-primary font-bold': $page.url === '/dashboard' }"
                            :href="route('dashboard')"
                            class="p-4 flex flex-col items-center justify-center rounded-md hover:underline smooth-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <p>Home</p>
                        </Link>

                        <Link :class="{ 'text-primary font-bold': $page.url.startsWith('/dashboard/ormawa') }"
                            :href="route('ormawa.index')"
                            class="p-4 flex flex-col items-center  justify-center rounded-md hover:underline smooth-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <p>Ormawa</p>
                        </Link>

                        <Link :href="route('file.index')"
                            :class="{ 'text-primary font-bold': $page.url.startsWith('/dashboard/file') }"
                            class="p-4 flex flex-col items-center  justify-center rounded-md hover:underline smooth-hover">
                        <v-icon name="md-folder" />
                        <p>File</p>
                        </Link>

                        <div class="indicator">
                            <span class="indicator-item badge badge-secondary">{{ $page.props.attr.notif }}</span>
                            <Link :href="route('notif')"
                                :class="{ 'text-primary font-bold': $page.url === '/dashboard/notif' }"
                                class="p-4 flex flex-col items-center  justify-center rounded-md hover:underline smooth-hover">
                            <v-icon name="io-notifications"></v-icon>
                            <p>Mail</p>
                            </Link>
                        </div>


                    </nav>

                    <div class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
                      
                        <label
                            class="swap swap-rotate bg-base-300 p-2 rounded-md hover:text-base-content/50 smooth-hover sm:mt-0 mr-3 lg:hidden">
                            <!-- this hidden checkbox controls the state -->
                            <input type="checkbox" class="opacity-0" @click="handleTheme" />

                            <!-- sun icon -->
                            <svg class="swap-on fill-current w-5" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                            </svg>

                            <!-- moon icon -->
                            <svg class="swap-off fill-current w-5" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                            </svg>
                        </label>

                        <Dropdown align="right" class="lg:hidden" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos"
                                    class="flex text-sm border-2 border-transparent border-primary rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <div class="indicator">
                                        <span class="indicator-item badge badge-xs badge-success"></span>
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                                    </div>
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-base-100 hover:text-gray-700 focus:outline-none transition">
                                        {{ $page.props.user.name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400 ">
                                    Manage Account
                                </div>

                                <DropdownLink :href="route('profile.show')">
                                    Profile
                                </DropdownLink>

                                <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                    :href="route('api-tokens.index')">
                                    API Tokens
                                </DropdownLink>

                                <div class="border-t border-gray-100" />

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <DropdownLink as="button">
                                        Log Out
                                    </DropdownLink>
                                </form>
                            </template>
                        </Dropdown>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 px-2 sm:px-0">
                    <div class="flex justify-between items-center pt-24 p-3 sm:pt-0 lg:pl-24">
                        <h3 class="text-3xl font-extralight">
                            <slot name="title" />
                        </h3>
                        <div class="inline-flex items-center space-x-2 gap-3">
                            <label for="my-drawer" class="btn btn-square btn-ghost hidden lg:inline-flex">
                                <v-icon name="io-notifications"></v-icon>
                            </label>
                            <!--theme-->
                            <label
                                class="swap swap-rotate bg-base-300 p-2 rounded-md hover:text-base-content/50 smooth-hover mt-20 sm:mt-0 mr-3 hidden lg:inline-grid">
                                <!-- this hidden checkbox controls the state -->
                                <input type="checkbox" class="opacity-0" @click="handleTheme" />

                                <!-- sun icon -->
                                <svg class="swap-on fill-current w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                                </svg>

                                <!-- moon icon -->
                                <svg class="swap-off fill-current w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                                </svg>
                            </label>

                            <Dropdown align="right" class="hidden lg:block" width="48">
                                <template #trigger>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos"
                                        class="flex text-sm border-2 border-transparent border-primary rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <div class="indicator">
                                            <span class="indicator-item badge badge-xs badge-success"></span>
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                                        </div>
                                    </button>

                                    <span v-else class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-base-100 hover:text-gray-700 focus:outline-none transition">
                                            {{ $page.props.user.name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400 ">
                                        Manage Account
                                    </div>

                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                        :href="route('api-tokens.index')">
                                        API Tokens
                                    </DropdownLink>

                                    <div class="border-t border-gray-100" />

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button">
                                            Log Out
                                        </DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>
                    </div>


                    <main data-aos="fade-up"
                        class="mb-10 sm:mb-0 sm:mt-5 grid gap-4 p-5 lg:pl-24 min-h-screen justify-center max-w-7xl mx-auto">
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>

</template>

