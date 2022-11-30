<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TableLayout from "../../Components/TableLayout.vue";

defineProps({
  items: Object,
  acc: Number,
})
</script>

<template>
  <AppLayout title="MyOrmawa">
    <template #title>
      Ormawa Management
    </template>

    <main>
      <TableLayout>
        <template #table>
          <div class="stats shadow mb-4 overflow-x-auto w-full">
            <div class="stat">
              <div class="stat-figure text-primary">
              </div>
              <div class="stat-title">Organisasi</div>
              <div class="stat-value text-info">{{ acc }}</div>
              <div class="stat-desc">yang di ikuti</div>
              <div class="stat-desc">
                <Link :href="route('organisasi.index')"><span class="text-blue-500">More</span></Link>
              </div>
            </div>

            <div class="stat">
              <div class="stat-title text-bold">Prestasi Lomba</div>
              <div class="stat-value text-secondary">1</div>
              <div class="stat-desc">Total Point Credits</div>
              <div class="stat-value">
                <Link :href="route('prestasi.index')" class="badge badge-xl badge-primary font-bold">Detail</Link>
              </div>
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
        <p class="text-blue-500 text-xs text-center">Anda bisa mendaftarkan diri anda melalui link berikut
          <Link class="cursor-p
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
                          <img v-if="item.organisasi.photo_url" :src="item.organisasi.photo_url"
                            alt="Avatar Tailwind CSS Component" />
                        </div>
                        {{ item.organisasi.name }}
                      </div>
                      <div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span v-if="item.status">
                      <span
                        class="text-xs font-semibold inline-block py-1 px-2 rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                        Accepted
                      </span>
                    </span>

                    <span v-else-if="item.status == 0"
                      class="text-xs font-semibold inline-block py-1 px-2 rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                      Ditolak
                    </span>

                    <span v-else>
                      <span
                        class="text-xs font-semibold inline-block py-1 px-2 rounded text-amber-600 bg-amber-200 uppercase last:mr-0 mr-1">
                        Pending
                      </span>
                    </span>
                  </td>
                  <th>
                    <Link :href="'/dashboard/ormawa/' + item.id"><button class="btn btn-info btn-xs">Details</button>
                    </Link>
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