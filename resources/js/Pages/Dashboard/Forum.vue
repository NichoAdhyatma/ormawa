<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  join: Object,
  anggota: Object,
})

</script>

<template>
  <AppLayout title="Forum - Ormawa">
    <template #title>
      <div class="flex gap-2 items-center">
        <div class="text-2xl breadcrumbs">
          <ul>
            <li>
              <Link :href="route('ormawa.index')">Ormawa Management</Link>
            </li>
            <li>
              <Link :href="route('organisasi.index')">Organisasi</Link>
            </li>
            <li class="text-primary">Struktur</li>
          </ul>
        </div>
      </div>
    </template>
    <main>
      <div v-if="join" class="p-6 sm:p-12 ">
        <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">
          <img :src="join.organisasi.photo_url" alt=""
            class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start bg-gray-500 border-gray-300">
          <div class="flex flex-col">
            <h4 class="text-lg font-semibold text-center md:text-left">{{ join.organisasi.name }}</h4>
            <p class="text-gray-600">{{ join.organisasi.visi }}</p>
          </div>
        </div>
        <div class="flex flex-col items-center justify-center pt-4 space-x-4 align-center">
          <div>Daftar Anggota Ormawa</div>
          <div class="overflow-x-auto w-full">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>Name</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr v-for="(item, key) in anggota">
                  <th>
                    {{ key + 1 }}
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img :src="item.profile_photo_url" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">{{ item.name }}</div>
                        <div class="text-sm opacity-50">{{ item.username }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-secondary font-bold">Anggota</span>
                  </td>
                  <td>Detail</td>

                </tr>
              </tbody>
              <!-- foot -->


            </table>
          </div>
        </div>
      </div>
    </main>
  </AppLayout>
</template>