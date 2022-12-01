<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";


defineProps({
  organisasi: Object,
})

const destroy = (id) => {
Inertia.delete('/dashboard/organisasi/' + id)
}
</script>

<template>
  <AppLayout>
    <template #title>
      <div class="flex gap-2 items-center">
        <div class="text-2xl breadcrumbs">
          <ul>
            <li>
              <Link :href="route('ormawa.index')">Ormawa Management</Link>
            </li>
            <li class="text-primary">Organisasi</li>
          </ul>
        </div>
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
              <Link :href="`/dashboard/organisasi/` + item.id " class="btn btn-primary">Masuk Forum</Link>
              <form @submit.prevent="destroy(item.id)">

                <button class="btn bg-red-500 text-white hover:bg-red-400 border-none">Keluar Organisasi</button>
              </form>
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