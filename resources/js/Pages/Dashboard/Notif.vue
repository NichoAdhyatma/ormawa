<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import TableLayoutVue from '../../Components/TableLayout.vue';

defineProps({
  user: Object
})
</script>

<template>
  <AppLayoutVue>
    <template #title>
      Mail Notifications
    </template>

    <main>
      <TableLayoutVue>
        <template #table>

          <div class="overflow-x-auto">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Body</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr v-for="(item, key) in user">
                  <th>{{ key+1 }}</th>
                  <td >{{ item.data.msg }}</td>
                  <td>{{ item.data.organisasi_name }}</td>
                  <td>
                    <div class="font-bold text-blue-500 cursor-pointer">Detail</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </template>
      </TableLayoutVue>
    </main>

  </AppLayoutVue>
</template>
