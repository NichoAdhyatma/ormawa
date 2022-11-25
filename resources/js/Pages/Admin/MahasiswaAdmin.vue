<script setup>
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
import TableLayout from "@/Components/TableLayout.vue"

defineProps({
  users: Object
})

</script>

<template>
  <AdminLayouts>

    <template #content>
      <TableLayout>
        <template #judul>
          <div>
            Tabel Data Mahasiswa
          </div>
        </template>
        <template #table>
          <div class="overflow-x-auto w-full">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <th>Name</th>
                  <th>Jurusan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr v-for="(item, key) in users">
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="https://ui-avatars.com/api/?name=T+U&color=7F9CF5&background=EBF4FF"
                            alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div> 
                        <div class="font-bold">{{ item.name }}</div>
                        <div class="text-sm">{{ item.username }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ item.jurusan.name }}

                  </td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>

              </tbody>
              <!-- foot -->


            </table>
          </div>
        </template>
      </TableLayout>
    </template>

  </AdminLayouts>
</template>