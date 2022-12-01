<script setup>
import AdminLayout from "@/Layouts/AdminLayouts.vue";

defineProps({
  prestasi: Object
})
</script>

<template>
  <AdminLayout>
    <template #title>
      <div>
        Rekap Prestasi
      </div>
    </template>
    <template #content>
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
                      <th>Mahasiswa</th>
                      <th>Prestasi</th>
                      <th>Tingkat</th>
                      <th>Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr v-for="(item, key) in prestasi">
                      <th>
                        {{ key + 1 }}
                      </th>
                      <td>
                        <div class="flex items-center space-x-3">
                          <div>
                            <div>
                              <div class="font-bold">{{ item.user.name }}</div>
                            </div>
                          </div>

                        </div>
                      </td>
                      <td>
                        <div>
                          <div class="font-bold">{{ item.name }}</div>
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
        </div>
        <Link :href="route('ormawa.index')">
        <button class="btn bg-green-500 text-white border-none hover:bg-green-300 mr-5">Kembali</button>
        </Link>
        <button class="btn bg-blue-500 text-white border-none hover:bg-blue-300 mt-5" @click="exportToPDF">Export to
          PDF</button>
      </div>
    </template>
  </AdminLayout>
</template>

<script>
import html2pdf from "html2pdf.js";
import TableLayout from "../../Components/TableLayout.vue";

export default {
  name: "app",
  methods: {
    exportToPDF() {
      html2pdf(document.getElementById("element-to-convert"), {
        margin: 1,
        filename: "rekap-prestasi.pdf",
      });
    },
  },
};
</script>