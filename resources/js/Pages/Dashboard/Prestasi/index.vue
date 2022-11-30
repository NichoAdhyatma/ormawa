<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import TableLayout from '../../../Components/TableLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  name: '',
  sertif: null,
  category_prestasi_id: '',
})

defineProps({
  type: Object,
  achive: Object,
})

const upload = () => {
  form.post(route('prestasi.index'), {

  });
}

const destroy = (id) => {
  form.delete(`/dashboard/prestasi/${id}`);
}

</script>

<template>
  <input type="checkbox" id="my-modal-4" class="modal-toggle" />
  <label for="my-modal-4" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
      <h3 class="text-lg font-bold">Form Tambah Prestasi</h3>
      <form @submit.prevent="upload()">
        <div class="mt-4">
          <InputLabel for="name" value="Judul Prestasi" />
          <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="mt-4">
          <InputLabel for="category" value="Tingkat Kategori Lomba" />
          <select id="category" v-model="form.category_prestasi_id" class="select select-bordered w-full mt-5">
            <option disabled selected>Pilih</option>
            <option v-for="item in type" :value="item.id">{{ item.name }}</option>
          </select>
          <InputError class="mt-2" :message="form.errors.category_prestasi_id" />
        </div>

        <div class="mt-4">
          <InputLabel for="sertif" value="Upload Bukti Sertifikast (*pdf / *png / *jpg)" />
          <input @input="(form.sertif = $event.target.files[0])" id="sertif" type="file"
            class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
          <InputError class="mt-2" :message="form.errors.sertif" />
        </div>

        <div class="mt-6">
          <button type="submit" class="btn btn-primary w-full">Upload</button>
        </div>

      </form>
    </label>
  </label>
  <AppLayout title="Prestasi">

    <template #title>
      <div>
        Prestasi
      </div>
    </template>

    <main>
      <!-- The button to open modal -->
      <div class="flex flex-col items-center gap-5">
        <label for="my-modal-4" class="btn btn-primary">Tambah Prestasi</label>

        <div v-if="$page.props.flash.message" class="alert alert-success shadow-lg mt-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span v-if="$page.props.flash.message">{{ $page.props.flash.message }}</span>
          </div>
        </div>

        <!-- Put this part before </body> tag -->

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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <tr v-for="(item, key) in achive">
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
                    <td><a :href="'/' + item.sertif" class="hover:underline"><v-icon name="fc-file"
                          class="mr-1"></v-icon>{{ item.sertif }}</a></td>
                    <td class="flex gap-3 items-center">
                      <Link :href="'/dashboard/prestasi/' + item.id + '/edit'" class="btn btn-info btn-xs">Edit</Link>
                      <form @submit.preventt="destroy(item.id)">
                        <button class="btn bg-red-500 text-white btn-xs hover:bg-red-400 border-none">Hapus</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </template>
        </TableLayout>
      </div>
    </main>
  </AppLayout>
</template>