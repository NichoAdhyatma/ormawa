<script setup>
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
import { Inertia } from "@inertiajs/inertia";
import TableLayouts from "@/Components/TableLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  joinAcc: Object,
  joinReject: Object,
  JoinPending: Object,
})

</script>

<template>
  <AdminLayouts>
    <main>
      <div class="flex flex-col items-center gap-5">
        <h1 class="my-5 font-bold text-2xl text-center">Tabel Pendaftaran Organisasi</h1>
        <TableLayouts>
          <template #judul>
            Accepted
          </template>
          <template #table>
            <div class="overflow-x-auto w-full">
              <table class="table w-full">
                <!-- head -->
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>Nama Mahasiswa</th>
                    <th>Organisasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <tr v-for="(item, key) in joinAcc">
                    <th>
                      {{ key + 1 }}
                    </th>
                    <td>
                      <div class="flex items-center space-x-3">
                        <div class="avatar">
                          <div class="mask mask-squircle w-12 h-12">

                          </div>
                        </div>
                        <div>
                          <div class="font-bold">{{ item.user.name }}</div>
                          <div class="text-sm opacity-50">{{ item.user.jurusan.name }}</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      {{ item.organisasi.name }}
                      <br />
                      <span class="badge badge-ghost badge-sm">{{ item.organisasi.category.name }}</span>
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
                      <Link :href="'/admin/' + item.id + '/edit'"  class="btn btn-primary">Details</Link>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </template>
        </TableLayouts>
        
        <TableLayouts class="mt-5">
          <template #judul>
            Reject
          </template>
          <template #table>
            <div class="overflow-x-auto w-full">
              <table class="table w-full">
                <!-- head -->
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>Nama Mahasiswa</th>
                    <th>Organisasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <tr v-for="(item, key) in joinReject">
                    <th>
                      {{ key + 1 }}
                    </th>
                    <td>
                      <div class="flex items-center space-x-3">
                        <div class="avatar">
                          <div class="mask mask-squircle w-12 h-12">

                          </div>
                        </div>
                        <div>
                          <div class="font-bold">{{ item.user.name }}</div>
                          <div class="text-sm opacity-50">{{ item.user.jurusan.name }}</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      {{ item.organisasi.name }}
                      <br />
                      <span class="badge badge-ghost badge-sm">{{ item.organisasi.category.name }}</span>
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
                      <Link :href="'/admin/' + item.id + '/edit'"  class="btn btn-primary">Details</Link>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </template>
        </TableLayouts>
        <TableLayouts class="mt-5">
          <template #judul>
            Pending
          </template>
          <template #table>
            <div class="overflow-x-auto w-full">
              <table class="table w-full">
                <!-- head -->
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>Nama Mahasiswa</th>
                    <th>Organisasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <tr v-if="JoinPending" v-for="(item, key) in JoinPending">
                    <th>
                      {{ key + 1 }}
                    </th>
                    <td>
                      <div class="flex items-center space-x-3">
                        <div class="avatar">
                          <div class="mask mask-squircle w-12 h-12">

                          </div>
                        </div>
                        <div>
                          <div class="font-bold">{{ item.user.name }}</div>
                          <div class="text-sm opacity-50">{{ item.user.jurusan.name }}</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      {{ item.organisasi.name }}
                      <br />
                      <span class="badge badge-ghost badge-sm">{{ item.organisasi.category.name }}</span>
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
                      <Link :href="'/admin/' + item.id + '/edit'"  class="btn btn-primary">Details</Link>
                    </th>
                  </tr>
                  <tr v-else>
                    <p class="text-red-500 font-semibold my-5">Data tidak ditemukan...</p>
                  </tr>
                </tbody>
              </table>
            </div>
          </template>
        </TableLayouts>
      </div>
    </main>
  </AdminLayouts>
</template>