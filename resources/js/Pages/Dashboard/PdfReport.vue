<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
  join: Object
})
</script>

<template>
  <AppLayout>

    <div id="app" ref="document">
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
      <div id="element-to-convert">
        <div class="p-5">
          <h1 class="text-center text-2xl font-semibold">Bukti Pendaftaran</h1>
          <div class="divider"></div>
          <div class="flex flex-col gap-5 text-xl p-5">
            <span>Nama : <strong>{{ join.user.name }}</strong></span>
            <span>Organisasi : <strong class="text-blue-500">{{ join.organisasi.name }}</strong></span>
            <span>Waktu Pendaftaran : <strong>{{ moment(join.created_at).format("DD-MM-YYYY hh:mm") }}</strong></span>
            <span>Status : <span v-if="join.status">
                <span
                  class="text-xs font-semibold inline-block py-1 px-2 rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                  Accepted
                </span>
              </span>

              <span v-else-if="join.status == 0"
                class="text-xs font-semibold inline-block py-1 px-2 rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                Ditolak
              </span>

              <span v-else>
                <span
                  class="text-xs font-semibold inline-block py-1 px-2 rounded text-amber-600 bg-amber-200 uppercase last:mr-0 mr-1">
                  Pending
                </span>
              </span></span>
          </div>
          <div class="divider"></div>
        </div>
      </div>
      <Link :href="route('ormawa.index')">
      <button class="btn bg-green-500 text-white border-none hover:bg-green-300 mr-5">Kembali</button>
      </Link>
      <button class="btn bg-blue-500 text-white border-none hover:bg-blue-300" @click="exportToPDF">Export to
        PDF</button>
    </div>
  </AppLayout>
</template>

<script>
import html2pdf from "html2pdf.js";
import moment from "moment";

export default {
  name: "app",
  methods: {
    exportToPDF() {
      html2pdf(document.getElementById("element-to-convert"), {
        margin: 1,
        filename: "bukti-pendaftaran.pdf",
      });
    },
  },
  data() {
    return {
      moment: moment
    }
  },
};
</script>

