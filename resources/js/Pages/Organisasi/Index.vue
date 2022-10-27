<script setup>
import PageLayout from "@/Layouts/PageLayout.vue"
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  items: Array
})
</script>


<template>

  <Head title="Welcome" />
  <PageLayout>
    <main>
      <h1 class="text-bold text-2xl text-center pb-20">{{ items[0].category.name }}</h1>
      <div data-aos="fade-left" data-aos-duration="500" class="flex justify-center gap-4 flex-wrap items-stretch">
        <div v-for="item in items" class="card w-96 bg-base-100 shadow-xl">
          <figure><img :src="item.photo_url" class="w-52 h-48" alt="Shoes" /></figure>
          <div class="card-body">
            <h2 class="card-title">
              {{ item.name }}
            </h2>
            <p>{{ item.visi }}</p>
            <p>{{ item.misi }}</p>
            <div class="card-actions justify-end">
              <Link class="underline text-primary font-bold">Learn More</Link>
            </div>
          </div>
        </div>
      </div>
    </main>
  </PageLayout>
</template>