<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
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

const logout = () => {
  Inertia.post(route('admin.logout'))
}
</script>

<template>
  <div :data-theme="theme">

    <Head :title="title" />
    <!--Admin-->
    <div class="navbar bg-base-100 w-full">
      <div class="navbar-start">
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </label>
          <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li>

            </li>
          </ul>
        </div>
        <div class="ml-5 hidden md:flex gap-5 align-items-center font-semibold">
          <Link :href="route('admin.mahasiswa')" :class="{ 'text-primary font-bold': $page.url == '/admin-mahasiswa' }">
          Mahasiswa</Link>
          <Link :href="'/admin'" :class="{ 'text-primary font-bold': $page.url == '/admin' }">Organisasi</Link>
          <Link :href="route('admin-struktur.index')"
            :class="{ 'text-primary font-bold': $page.url.startsWith('/admin-struktur/') || $page.url.startsWith('/admin-struktur') }">
          Struktur Organisasi
          </Link>
          <Link :href="route('rekap.prestasi')">Prestasi</Link>
        </div>
      </div>

      <div class="navbar-end">
        <button class="mr-5">
          <label class="swap swap-rotate">

            <!-- this hidden checkbox controls the state -->
            <input type="checkbox" class="opacity-0" @click="handleTheme" />

            <!-- sun icon -->
            <svg class="swap-on fill-current w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path
                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
            </svg>

            <!-- moon icon -->
            <svg class="swap-off fill-current w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path
                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
            </svg>

          </label>
        </button>
        <form @submit.prevent="logout">
          <button class="mr-5 text-primary font-bold">Logout</button>
        </form>
      </div>

    </div>
    <header class="mt-10 text-3xl text-center">
      <slot name="title" />
    </header>
    <main class="max-w-7xl min-h-screen mx-auto pb-5">
      <div class="flex flex-col items-center gap-5 p-4">
        <slot name="content" />
      </div>
    </main>
  </div>
</template>