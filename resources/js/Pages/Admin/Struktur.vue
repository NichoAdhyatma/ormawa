<script setup>
import AdminLayout from "@/Layouts/AdminLayouts.vue"
import { Link } from "@inertiajs/inertia-vue3";


defineProps({
  organisasi: Object
})
</script>

<template>
  <AdminLayout>
    <template #title>
      <div>
        Struktur Organisasi
      </div>
    </template>

    <template #content>
      <div class="flex gap-3 flex-wrap justify-center items-stretch mt-5">
        <div v-for="(item, key) in organisasi" class="w-full max-w-md p-8 sm:flex sm:space-x-6 bg-base-300">
          <div class="flex-shrink-0 w-full mb-6 h-44 sm:h-32 sm:w-32 sm:mb-0">
            <img class="mask" :src="item.photo_url" />
          </div>
          <div class="flex flex-col space-y-4">
            <div>
              <h2 class="text-2xl font-semibold">{{ }}</h2>
              <span class="text-sm font-semibold text-blue-600">{{ item.name }}</span>
            </div>
            <div class="space-y-1">
              <span class="flex items-center space-x-2">

                <span class="">{{ item.category.name }}</span>
              </span>
              <span class="flex items-center space-x-2">

                <Link :href="'/admin-struktur/' + item.id" class="badge badge-primary">Detail</Link>
              </span>
            </div>
          </div>
        </div>
      </div>
    </template>

  </AdminLayout>
</template>