<script setup>
import AdminLayout from "@/Layouts/AdminLayouts.vue"
import { inject } from "vue";

const swal = inject('$swal')

defineProps({
  org: Object,
  member: Object
})

const submit = (e) => {
  swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: 'primary',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Activate'
  }).then((result) => {
    
  });
}
</script>

<template>
  <AdminLayout title="Detail - Struktur">
    <!-- The button to open modal -->
    <!-- Put this part before </body> tag -->

    <template #title>
      <div>
        Detail Struktur Organisasi
      </div>
    </template>
    <template #content>
      <input type="checkbox" id="my-modal-3" class="modal-toggle" />
      <div class="modal">
        <div class="modal-box relative">
          <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
          <h3 class="text-lg font-bold">Edit anggota</h3>
          <p class="py-4">
          <form>

          </form>
          </p>
        </div>
      </div>
      <div v-if="org" class="p-6 sm:p-12 max-w-4xl">
        <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">
          <img :src="org.photo_url" alt=""
            class="flex-shrink-0 w-24 h-24 border rounded-full  border-gray-300">
          <div class="flex flex-col">
            <h4 class="text-lg font-semibold text-center md:text-left">{{ org.name }}</h4>
            <p class="">{{ org.visi }}</p>
            <p class="my-5"> Ketua : {{ org.ketua }}
            <form @submit.prevent="submit">
              <select class="select select-bordered w-full max-w-xs">
                <option disabled selected>Pilih Ketua</option>
                <option v-for="item in member" value="{{ item.id }}">{{ item.name }}</option>
              </select>
              <button class="btn btn-sm btn-primary mt-3">Pilih</button>
            </form>
            </p>

            <p class="my-5">Wakil : {{ org.wakil }}
              <form action="">
                <select class="select select-bordered w-full max-w-xs">
                  <option disabled selected>Pilih Wakil</option>
                  <option v-for="item in member" value="{{ item.id }}">{{ item.name }}</option>
                </select>
                <button class="btn btn-sm btn-primary mt-3">Pilih</button>
              </form>
            </p>
          </div>
        </div>
        <div class="flex flex-col items-center justify-center pt-4 space-x-4 align-center">
          <div>Daftar Anggota Ormawa</div>
          <div class="overflow-x-auto w-full mt-5">
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
                <tr v-for="(item, key) in member">
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
                  <td><label for="my-modal-3"
                      class="badge badge-x bg-red-500 text-white border-none hover:bg-red-600">Hapus</label></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </template>

  </AdminLayout>
</template>