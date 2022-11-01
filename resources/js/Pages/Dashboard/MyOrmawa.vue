<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TableLayout from "../../Components/TableLayout.vue";

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

    <main class="p-3">
      <TableLayout>
        <template #table>
          <div class="stats shadow mb-4 overflow-x-auto w-full">
            <div class="stat">
              <div class="stat-figure text-primary">
              </div>
              <div class="stat-title">Total SKS</div>
              <div class="stat-value text-primary">19</div>
              <div class="stat-desc">SKS semester 3</div>
            </div>

            <div class="stat">
              <div class="stat-title text-bold">IP</div>
              <div class="stat-value text-secondary">3.75</div>
              <div class="stat-desc">Total Point Credit</div>
            </div>

            <div class="stat">
              <div class="stat-figure text-secondary">
                <div class="avatar online">
                  <div class="w-16 rounded-full">
                    <img :src="$page.props.user.profile_photo_url" />
                  </div>
                </div>
              </div>
              <div class="stat-value">86%</div>
              <div class="stat-title">Progress Semester</div>
              <div class="stat-desc text-secondary cursor-pointer">Convert SKS</div>
            </div>

          </div>
        </template>
      </TableLayout>

      <div class="flex flex-col items-center flex-wrap p-3">
        <h1 class="text-bold mb-5 text-2xl">Organisasi</h1>
        <p class="text-blue-700 text-xs text-center">Anda bisa mendaftarkan diri anda melalui link berikut <Link
            class="cursor-p
            ointer underline font-bold" :href="route('ormawa.create')">Daftar Organisasi</Link>
        </p>
      </div>

      <TableLayout>
        <template #table>
          <div class="overflow-x-auto w-full mt-3">
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
                          <img :src="item.organisasi.photo_url" alt="Avatar Tailwind CSS Component" />
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
        </template>
      </TableLayout>
    </main>
  </AppLayout>
</template>