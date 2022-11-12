<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';


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
  <AppLayout title="Form Pendaftaran - Ormawa">
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

      <form v-if="$page.props.user.file[0].file_cv && $page.props.user.file[0].file_porto" @submit.prevent="submit"
        class="mt-5 bg-base-200 p-4 rounded-md">
        <div class="mt-3">
          <InputLabel for="organisasi_id" value="Pilih Organisasi" />
          <select id="organisasi_id" v-model="form.organisasi_id" class="select select-bordered w-full max-w-xs mt-1">
            <option disabled selected>Pilih Organisasi</option>
            <option v-for="org in organisasi" :value="org.id">{{ org.name }}</option>
          </select>
          <InputError class="mt-2" :message="form.errors.organisasi_id" />
        </div>
        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
          class="mt-3 bg-primary text-white p-2 rounded-md cursor-pointer">Submit</button>
      </form>
      <div v-else class="my-5 text-blue-600">Gak bisa daftar bro.. , Silahkan Upload File CV dan Portofolio dulu di link
        berikut
        <Link class="font-bold" :href="route('file.index')">Upload</Link>
      </div>

    </main>
  </AppLayout>
</template>