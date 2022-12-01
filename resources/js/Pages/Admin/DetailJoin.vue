<script setup>
import AdminLayout from "@/Layouts/AdminLayouts.vue"
import { Link, useForm } from '@inertiajs/inertia-vue3';
import TableLayout from "../../Components/TableLayout.vue";

defineProps({
  join: Array
})

const form = useForm({
  id: '',
  status: null
})

const setStatus = (status, id) => {
  form.status = status
  form.id = id
}

const submit = (id) => {
  form.put(`/admin/${id}`)

}
</script>

<template>
  <AdminLayout>
    <template #content>
      <Link :href="route('admin.index')">
      <v-icon name="io-arrow-back" scale="2"></v-icon>
      </Link>
      <h1 class="text-2xl">Detail Pendaftar Mahasiswa</h1>
      <div
        class="bg-base-300 w-full mx-auto p-2 sm:p-4 rounded-2xl shadow-lg flex flex-col sm:flex-row gap-5 select-none ">
        <div class="flex flex-col flex-1 gap-5 sm:p-2">
          <div class="flex flex-1 flex-col gap-3">
            <div class=" rounded-2xl flex flex-col gap-3 mb-3 text-xl">
              <p>Nama : {{ join[0].user.name }} </p>
              <p>Organisasi : {{ join[0].organisasi.name }}</p>
              <div class="flex flex-col gap-4" v-if="join[0].user.file[0]">
                <p>File CV : {{ join[0].user.file[0].file_cv_name }} <a class="text-primary font-bold mt-3"
                    :href="'/' + join[0].user.file[0].file_cv" download>Download</a></p>
                <p>File Porto : {{ join[0].user.file[0].file_porto_name }} <a class="text-primary font-bold"
                    :href="'/' + join[0].user.file[0].file_porto" download>Download</a></p>
              </div>


              <div v-else class="text-gray-400">
                Tidak Mengupload File
              </div>

              <TableLayout>
                <template #judul>
                  <div>
                    Data Prestasi
                  </div>
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
                          <th>Name</th>
                          <th>Tingkat</th>
                          <th>Sertifikat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        <tr v-for="(item, key) in join[0].user.prestasi">
                          <th>
                            {{ key + 1 }}
                          </th>
                          <td>
                            <div class="flex items-center space-x-3">
                              <div class="avatar">

                              </div>
                              <div>
                                <div class="font-bold">{{ item.name }}</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <v-icon name="ri-medal-fill"></v-icon> {{ item.category.name }}
                          </td>
                          <td><a :href="('/' + item.sertif_path)" class="hover:underline"><v-icon name="fc-file"
                                class="mr-1"></v-icon>{{ item.sertif }}</a></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>
                </template>
              </TableLayout>

              <p class="mt-5">Status <span v-if="join[0].status">
                  <span
                    class="text-xs font-semibold inline-block py-1 px-2 rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                    Accepted
                  </span>
                </span>

                <span v-else-if="join[0].status == 0"
                  class="text-xs font-semibold inline-block py-1 px-2 rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                  Ditolak
                </span>

                <span v-else>
                  <span
                    class="text-xs font-semibold inline-block py-1 px-2 rounded text-amber-600 bg-amber-200 uppercase last:mr-0 mr-1">
                    Pending
                  </span>
                </span>
              </p>
            </div>
          </div>
        
          <div v-if="!join[0].status" class="flex gap-3">
            <form @submit.prevent="submit(join[0].id)" class="flex gap-2 mt-3">
              <button for="my-modal-3" v-on:click="setStatus(true, join[0].organisasi_id)" type="submit"
                class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                Terima
              </button>

              <button type="submit" v-on:click="setStatus(false, join[0].organisasi_id)"
                class="py-2 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                Tolak
              </button>
            </form>
          </div>
        </div>
      </div>
    </template>
  </AdminLayout>
</template>