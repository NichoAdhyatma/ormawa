<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TableLayout from "@/Components/TableLayout.vue";
import { inject, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const theme = ref('light')
const show = ref('modal cursor-pointer')

const themeHandler = () => {
  if (localStorage.getItem("theme")) {
    theme.value = localStorage.getItem('theme')
  }
}

defineProps({
  files: Object,
  status: Boolean,
  errors: Object,
})

const swal = inject('$swal')

const file = useForm({
  file_cv: null,
  file_cv_name: null,
  file_porto: null,
  file_porto_name: null
})

const form = useForm()

const submit = (event) => {
  swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Activate'
  }).then((result) => {
    if (result.isConfirmed) {
      form.post(route('file.store'))
    }
  });
}

const update = (id) => {
  Inertia.post('/dashboard/file/' + `${id}`, {
    _method: 'put',
    file_cv: file.file_cv,
    file_porto: file.file_porto,
  })
}

const destroy = (hparam) => {
  swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Activate'
  }).then((result) => {
    if (result.isConfirmed) {
      Inertia.post('/file/delete', {
        header: hparam,
      });
    }
  });
}
</script>

<template>
  <input type="checkbox" id="my-modal-4" class="modal-toggle" />
  <label for="my-modal-4" :class="show">
    <label :data-theme="theme" class="modal-box relative">
      <h3 class="text-lg font-bold">Form Tambah File</h3>

      <form @submit.prevent="update($page.props.user.id)">
        <div class="mt-4">
          <InputLabel for="file_cv" value="Upload CV (*pdf)" />
          <input @input="file.file_cv = $event.target.files[0]" id="file_cv" type="file"
            class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
          <InputError class="mt-2" :message="errors.file_cv" />
        </div>

        <div class="mt-4">
          <InputLabel for="file_porto" value="Upload Porto Folio (tidak wajib)" />
          <input @input="file.file_porto = $event.target.files[0]" id="file_porto" type="file"
            class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
          <InputError class="mt-2" :message="errors.file_porto" />
        </div>

        <button :class="{ 'opacity-25': file.processing }" :disabled="file.processing"
          class="mt-3 bg-primary text-white p-2 rounded-md cursor-pointer">Submit</button>
      </form>
    </label>
  </label>
  <AppLayout title="File">
    <template #title>
      File Management
    </template>

    <main>
      <p>Upload File Portofolio dan CV mu disini</p>

      <!-- The button to open modal -->
      <label v-if="status" for="my-modal-4" class="badge badge-primary badge-xl" v-on:click="themeHandler">Tambah
        File</label>

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

      <!-- Put this part before </body> tag -->


      <div v-if=status class="flex flex-col items-start gap-5 mt-5">
        <div>
          <p>File CV</p>
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
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr v-if="files[0].file_cv" v-for="(file, key) in files">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                        {{ file.file_cv_name }}
                      </td>

                      <td>
                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded text-indigo-600 bg-indigo-200 uppercase last:mr-0 mr-1"
                          :href="'/' + file.file_cv" download>Download</a>
                        <form @submit.prevent="destroy('cv')">
                          <input type="hidden" value="">
                          <button class="badge bg-red-500 border-none">Delete</button>
                        </form>
                      </td>
                    </tr>
                    <tr v-else>
                      <p class="text-warning font-bold">Belum ada filenya bro...</p>
                    </tr>
                  </tbody>
                </table>
              </div>
            </template>
          </TableLayout>
        </div>
        <div>
          <p>File Portofolio</p>
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
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr v-if="files[0].file_porto" v-for="(file, key) in files">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                        {{ file.file_porto_name }}
                      </td>

                      <td>
                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded text-indigo-600 bg-indigo-200 uppercase last:mr-0 mr-1"
                          :href="'/' + file.file_porto" download>Download</a>
                        <form @submit.prevent="destroy('porto')">
                          <input type="hidden" value="">
                          <button class="badge bg-red-500 border-none">Delete</button>
                        </form>
                      </td>
                    </tr>
                    <tr v-else>


                      <p class="text-warning font-bold">Belum ada filenya bro...</p>
                    </tr>
                  </tbody>
                </table>
              </div>
            </template>
          </TableLayout>
        </div>
      </div>

      <div v-else class="flex flex-col items-center">
        <form @submit.prevent="submit">
          <button class="btn btn-primary my-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Activate Your File Repository
          </button>
        </form>
        <v-icon name="md-folderoff-sharp" class="text-center" scale="3.5" animation="wrench" />
      </div>
    </main>
  </AppLayout>
</template>

