<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import TableLayoutVue from '../../Components/TableLayout.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
  users: Object
})

const submit = (id) => {
  Inertia.delete(`/dashboard/notif/${id}`)
}

const read = (id) => {
  Inertia.post(`/dashboard/notif/${id}`)
}
</script>

<template>
  <AppLayoutVue>
    <template #title>
      Mail Notifications
    </template>

    <main id="app">
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr v-for="(item, key) in users" :class="{ 'active': item.read_at }">
                  <th>{{ key + 1 }}</th>
                  <td>{{ item.data.msg }}</td>
                  <td>{{ item.data.organisasi_name }}</td>
                  <td>
                    <form @submit.prevent="read(item.id)" v-if="!item.read_at">
                      <button>
                        <div class="font-bold text-blue-500 cursor-pointer">Mark As Read</div>
                      </button>
                    </form>
                    <div v-else>Read {{ moment(item.read_at).fromNow() }}</div>
                  </td>
                  <td class="flex gap-4">
                    <form @submit.prevent="submit(item.id)">
                      <button class="badge badge-xl bg-red-600 border-none hover:bg-red-500">
                        <v-icon name="md-delete-round"></v-icon>
                      </button>
                    </form>
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

<script>
import moment from "moment";

export default {
  name: "app",
  data() {
    return {
      moment: moment
    }
  },
};
</script>
