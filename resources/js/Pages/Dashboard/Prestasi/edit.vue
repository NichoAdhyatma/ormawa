<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
  data: Object,
  type: Object,
})

const form = useForm({
  name: '',
  sertif: null,
  category_id: '',
})

</script>

<template>
  <AppLayout title="Edit - Prestasi">

    <template #title>
      <div>
        Prestasi Edit Form
      </div>
    </template>

    <main>
      <!-- The button to open modal -->
      <div class="flex flex-col items-center gap-5">
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

        <form action="" class="max-w-5xl">
          <div class="mt-4">
            <InputLabel for="name" value="Judul Prestasi" />
            <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" :value="data.name" />
            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="category" value="Tingkat Kategori Lomba" />
            <select id="category" :v-model="(form.category_id = data.id)" class="select select-bordered w-full mt-5">
              <option v-for="item in type" :value="item.id" :selected="(item.id == data.category_prestasi_id)">
                {{
                    item.name
                
                }}
              </option>
            </select>
            <InputError class="mt-2" :message="form.errors.category_prestasi_id" />
          </div>

          <div class="mt-4">
            <InputLabel for="sertif" value="Ubah Bukti Sertifikat (*pdf / *png / *jpg)" />
            <input @input="(form.sertif = $event.target.files[0])" id="sertif" type="file"
              class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-1" />
            <InputError class="mt-2" :message="form.errors.sertif" />
          </div>

          <button class="btn btn-primary my-5 w-full btn-md">Edit</button>
        </form>
      </div>
    </main>
  </AppLayout>
</template>