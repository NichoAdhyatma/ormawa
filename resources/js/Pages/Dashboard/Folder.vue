<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CardVue from '@/Components/Card.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TableLayout from "@/Components/TableLayout.vue";

defineProps({
  files: Object
})

const form = useForm({
  file_porto: null,
  file_cv: null
})

const submit = () => {
  form.post(route('file.store'), {
    onFinish: () => {
      form.reset('file_cv', 'file_porto')
    }
  })
}
</script>

<template>
  <AppLayout>
    <template #title>
      File Management
    </template>

    <main>
      <p>Upload File Portofolio dan CV mu disini</p>

      <!-- The button to open modal -->
      <label for="my-modal-4" class="btn btn-info my-2">Add New File</label>

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
      <input type="checkbox" id="my-modal-4" class="modal-toggle" />
      <label for="my-modal-4" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
          <h3 class="text-lg font-bold">Form Tambah File</h3>
          <form @submit.prevent="submit">
            <div class="mt-4">
              <InputLabel for="file_cv" value="Upload CV (*pdf)" />
              <input @input="form.file_cv = $event.target.files[0]" id="file_cv" type="file"
                class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
              <InputError class="mt-2" :message="form.errors.file_cv" />
            </div>

            <div class="mt-4">
              <InputLabel for="file_porto" value="Upload Porto Folio (tidak wajib)" />
              <input @input="form.file_porto = $event.target.files[0]" id="file_porto" type="file"
                class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
              <InputError class="mt-2" :message="form.errors.file_porto" />
            </div>

            <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
              class="mt-3 bg-primary text-white p-2 rounded-md cursor-pointer">Submit</button>
          </form>
        </label>
      </label>

      <div class="flex flex-col items-start gap-5 mt-5">
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
                    <tr v-for="(file, key) in files">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                      </td>

                      <td>
                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded text-indigo-600 bg-indigo-200 uppercase last:mr-0 mr-1"
                          :href="'/' + file.file_cv" download >Download</a>
                      </td>


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
                    <tr v-for="(file, key) in files">
                      <td>
                        {{ key + 1 }}
                      </td>
                      <td>
                        <v-icon name="vi-file-type-pdf2" />
                      </td>

                      <td>
                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded text-indigo-600 bg-indigo-200 uppercase last:mr-0 mr-1"
                          :href="'/' + file.file_porto" download >Download</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </template>
          </TableLayout>
        </div>
      </div>
    </main>
  </AppLayout>
</template>