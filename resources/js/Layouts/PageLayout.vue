<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import { Inertia } from '@inertiajs/inertia';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const theme = ref('light');
const showingNavigationDropdown = ref(false);

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

const logout = (e) => {
  e.preventDefault();
  Inertia.post(route('logout'));
};
</script>

<template>
  <div :data-theme="theme">
    <!--Navbar-->
    <div class="navbar bg-base-100 fixed px-auto top-0 z-20 drop-shadow-md">
      <div class="navbar max-w-6xl mx-auto !p-0">

        <div class="flex-1 gap-4 hidden sm:flex">
          <Link :href="route('home')" class="btn btn-ghost normal-case text-xl">
          <ApplicationMark />
          </Link>
          <NavLink :href="route('home')" :active="route().current('home')">
            Home
          </NavLink>
          <div class="dropdown"
            :class="{ 'text-primary px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition': $page.url.startsWith('/category') }">
            <label tabindex="0" class="cursor-pointer">Organisasi</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-96">
              <li>
                <NavLink href="/category/1" :active="$page.url === '/category/1'">Himpunan Mahasiswa Aktif (HIMA)
                </NavLink>
              </li>
              <li>
                <NavLink href="/category/2" :active="$page.url === '/category/2'">Unit Kegiatan Mahasiswa (UKM)
                </NavLink>
              </li>
              <li>
                <NavLink href="/category/3" :active="$page.url === '/category/3'">Badan Eksekutif Mahasiswa (BEM)
                </NavLink>
              </li>
              <li>
                <NavLink href="/category/4" :active="$page.url === '/category/4'">Komunitas</NavLink>
              </li>
            </ul>
          </div>
        </div>

        <div class="flex-1 sm:hidden gap-3">
          <label class="btn btn-primary btn-circle swap swap-rotate">

            <!-- this hidden checkbox controls the state -->
            <input type="checkbox" class="opacity-0 z-10"
              @click="() => showingNavigationDropdown = !showingNavigationDropdown" />

            <!-- hamburger icon -->
            <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
              viewBox="0 0 512 512">
              <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
            </svg>

            <!-- close icon -->
            <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
              viewBox="0 0 512 512">
              <polygon
                points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
            </svg>

          </label>


        </div>

        <div class="flex-none">
          <label class="swap swap-rotate mr-5">
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

          <div v-if="$page.props.user" class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img :src="$page.props.user.profile_photo_url" />
              </div>
            </label>
            <ul tabindex="0"
              class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 z-30">
              <li>
                <Link :href="route('dashboard')">Dashboard</Link>
              </li>
              <li>
                <form class="w-full" :onsubmit=logout>
                  <button>
                    Log Out
                  </button>
                </form>
              </li>
            </ul>
          </div>

          <div v-else class="flex items-center gap-3 mr-5">

            <label for="my-modal-3" class="btn-primary px-3 py-2 rounded">Login</label>

            <Link :href="route('register')" class="text-primary font-bold">Register</Link>
          </div>
        </div>
      </div>


    </div>

    <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }" class="sm:hidden pt-20">
      <div class="pt-2 pb-3 space-y-1">
        <ResponsiveNavLink href="/" :active="$page.url === '/'">
          Home
        </ResponsiveNavLink>
        <ResponsiveNavLink :href="route('organisasi.index')" :active="route().current('ormawa.index')">
          Organisasi
        </ResponsiveNavLink>
      </div>
    </div>

    <!-- Page Heading -->
    <header v-if="$slots.header" class="bg-base shadow pt-12">
      <div class="max-w-7xl text-center mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- The button to open modal -->

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-3" class="modal-toggle z-10" />
    <label for="my-modal-3" class="modal cursor-pointer">
      <label class="modal-box relative flex flex-col items-center gap-5" for="">
        <Link :href="route('login')">
        <PrimaryButton>Login Mahasiswa</PrimaryButton>
        </Link>
        <Link :href="route('admin.login')">
          <PrimaryButton>Login Admin</PrimaryButton>
        </Link>

      </label>
    </label>

    <!-- Page Content -->
    <main data-aos="fade-left" data-aos-duration="500"
      class="max-w-7xl mx-auto min-h-screen pt-32 flex flex-col items-center">

      <slot />
    </main>
    <footer class="footer footer-center p-10 bg-base-100 mt-32">
      <div>
        <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
          clip-rule="evenodd" class="inline-block fill-current">
          <path
            d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
          </path>
        </svg>
        <p class="font-bold">
          Ormawa PENS<br>Providing reliable tech since 2022
        </p>
        <p>Copyright © 2022 - All right reserved</p>
      </div>
      <div>
        <div class="grid grid-flow-col gap-4">
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
              <path
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
              </path>
            </svg></a>
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
              <path
                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
              </path>
            </svg></a>
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
              <path
                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
              </path>
            </svg></a>
        </div>
      </div>
    </footer>
  </div>
</template>