<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  organisasi: Object
})
</script>

<template>
  <AppLayout>
    <template #title>
      <div class="flex gap-2 items-center">
        <Link :href="route('ormawa.index')">
        <v-icon name="io-arrow-back" scale="2"></v-icon>
        </Link> Ormawa Management / Organisasi
      </div>
    </template>
    <main>
      <div class="text-2xl">Organisasi</div>
      <div class="flex flex-col sm:flex-row gap-4 flex-wrap mt-5 items-stretch">
        <!-- <img src="{{ item.organisasi.photo_url }}" alt=""> -->
        <div v-if="organisasi.length > 0" v-for="(item, key) in organisasi" class="card w-96 bg-base-100 shadow-xl">
          <div class="card-body">
            <h2 class="card-title"><img :src="item.organisasi.photo_url" class="w-20 h-20" alt="Shoes" />{{
                item.organisasi.name
            }}</h2>
            <div class="mt-5 flex gap-3 items-center">
              <button class="btn btn-primary">Masuk Forum</button>
              <button class="btn bg-red-500 text-white hover:bg-red-400 border-none">Keluar Organisasi</button>
            </div>
          </div>
        </div>
        <div v-else>
          <span class="text-center text-slate-500">Tidak ada orgnisasi yang di ikuti..</span>
        </div>
      </div>
    </main>
  </AppLayout>
</template>