<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
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

const logout = () => {
  Inertia.post(route('admin.logout'))
}
</script>

<template>
  <div :data-theme="theme">
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
          <Link :href="route('admin.mahasiswa')">Mahasiswa</Link>
          <Link :href="'/admin'">Organisasi</Link>
        </div>
      </div>

      <div class="navbar-end">
        <button class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
        <form @submit.prevent="logout">
          <button class="mr-5 text-primary font-bold">Logout</button>
        </form>
      </div>

    </div>
    <main class="max-w-7xl min-h-screen mx-auto pb-5">
      <div class="flex flex-col items-center gap-5 p-4">
        <slot name="content" />
      </div>
    </main>
  </div>
</template>