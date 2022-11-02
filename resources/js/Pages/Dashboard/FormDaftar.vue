<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
  organisasi: Array
})

const form = useForm({
  organisasi_id: '',
  file_cv: null,
  file_porto: null
})

const submit = () => {
  form.post(route('ormawa.store'), {
    onFinish: () => { form.reset('organisasi_id') }
  });
};
</script>
<template>
  <AppLayout title="Form Pendaftaran - Ormawa">
    <template #header>
      <h1>Form Pendaftaran Organisasi</h1>
    </template>

    <main>
      <h1 class="text-2xl font-bold">Ini Form Pendaftaran Ya Cuy ..</h1>
      <div v-if="$page.props.flash.fail" class="alert alert-error shadow-lg  mt-2">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span v-if="$page.props.flash.fail">{{ $page.props.flash.fail }}</span>
        </div>
      </div>

      <div v-if="$page.props.flash.message" class="alert alert-success shadow-lg">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span v-if="$page.props.flash.message">{{ $page.props.flash.message }}</span>
        </div>
      </div>
      <form @submit.prevent="submit" class="mt-12 bg-base-200 p-4 rounded-md">
        <div class="mt-3">
          <InputLabel for="organisasi_id" value="Pilih Organisasi" />
          <select id="organisasi_id" v-model="form.organisasi_id" class="select select-bordered w-full max-w-xs mt-1">
            <option disabled selected>Pilih Organisasi</option>
            <option v-for="org in organisasi" :value="org.id">{{ org.name }}</option>
          </select>
          <InputError class="mt-2" :message="form.errors.organisasi_id" />
        </div>

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

        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
          {{ form.progress.percentage }}%
        </progress>

        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
          class="mt-3 bg-primary text-white p-2 rounded-md cursor-pointer">Submit</button>
      </form>
    </main>
  </AppLayout>
</template>