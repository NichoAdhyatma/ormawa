<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
  items: Object
})
</script>

<template>
  <AppLayout title="My-Ormawa">
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">
        My Ormawa
      </h2>
    </template>

    <main>
      <span class="text-blue-700 text-xs">Anda bisa mendaftarkan diri anda melalui link berikut <strong class="cursor-pointer hover:underline">Daftar Organisasi</strong> </span>
      <div class="overflow-x-scroll pt-3">
        <table class="table mx-auto">
          <!-- head -->
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <tr v-for="(item, key) in items">
              <th>
                <p>{{ key + 1 }}</p>
              </th>
              <td>
                <div class="flex items-center space-x-3">
                  <div class="flex items-center gap-3">
                    <div class="mask mask-squircle w-12 h-12">
                      <img src="/organisasi-photos/HIMIT.png" alt="Avatar Tailwind CSS Component" />
                    </div>
                    {{ item.organisasi.slug }}
                  </div>
                  <div>
                  </div>
                </div>
              </td>
              <td>
                <div v-if="item.status" class="text-success font-semibold">
                  <p>Accepted </p>
                </div>
                <div v-else class="text-warning font-semibold">
                  <p>Pending</p>
                </div>
              </td>
              <th>
                <button class="btn btn-info btn-xs">details</button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>


    </main>
  </AppLayout>
</template>