<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TableLayout from '../../Components/TableLayout.vue';

defineProps({
  organisasi: Array
})

const form = useForm({
  organisasi_id: '',
})

const submit = () => {
  form.post(route('ormawa.store'), {
    onFinish: () => { form.reset() }
  });
};
</script>
<template>
  <AppLayout title="Form Pendaftaran">
    <template #header>
      <h1>Form Pendaftaran Organisasi</h1>
    </template>

    <main>
      <h1 class="text-2xl font-bold">Ini Form Pendaftaran Ya Cuy ..</h1>

      <div v-if="$page.props.flash.fail" class="alert alert-error shadow-lg mt-5">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span v-if="$page.props.flash.fail">{{ $page.props.flash.fail }}</span>
        </div>
      </div>

      <div v-if="!$page.props.user.file[0]">
        <span class="text-blue-600 font-semibold">Aktifin dulu folder file mu..</span>
      </div>

      <form v-else-if="$page.props.user.file[0].file_cv && $page.props.user.file[0].file_porto" @submit.prevent="submit"
        class="mt-5 bg-base-200 p-4 rounded-md">
        <div class="mt-3">
          <InputLabel for="organisasi_id" value="Pilih Organisasi" />
          <select id="organisasi_id" v-model="form.organisasi_id" class="select select-bordered w-full mt-1">
            <option disabled selected>Pilih Organisasi</option>
            <option v-for="org in organisasi" :value="org.id">{{ org.name }}</option>
          </select>
          <InputError class="mt-2" :message="form.errors.organisasi_id" />
        </div>

        <div>
          <TableLayout>
            <template #judul>
              <div>
                <p>File CV dan File Porto </p>
              </div>
            </template>
            <template #table>
              <div class="overflow-x-auto w-full">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>File</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr v-for="(file, key) in $page.props.user.file">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                        {{ file.file_cv_name }}
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </template>
          </TableLayout>
        </div>
        <div>
          <TableLayout>
            <template #table>
              <div class="overflow-x-auto w-full">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>File</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr v-for="(file, key) in $page.props.user.file">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                        {{ file.file_porto_name }}
                      </td>


                    </tr>

                  </tbody>
                </table>
              </div>
            </template>
          </TableLayout>
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
                  <tr v-for="(item, key) in $page.props.user.prestasi">
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
        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
          class="mt-6 bg-primary text-white p-2 rounded-md cursor-pointer w-full">Submit</button>
      </form>
      <div v-else class="my-5 text-blue-600">Gak bisa daftar bro.. , Silahkan Upload File CV dan Portofolio dulu di link
        berikut
        <Link class="font-bold" :href="route('file.index')">Upload</Link>
      </div>

    </main>
  </AppLayout>
</template>