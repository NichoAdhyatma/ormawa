<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
  <AppLayout title="My-Ormawa">
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">
        My Ormawa
      </h2>
    </template>

    <main>
      <div class="overflow-x-auto w-full py-12">
        <table class="table mx-auto w-1/2">
          <!-- head -->
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <tr>
              <th>
                <p>1</p>
              </th>
              <td>
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                      <img src="organisasi_photos/himit.jpg" alt="Avatar Tailwind CSS Component" />
                    </div>
                  </div>
                  <div>
                    <div class="font-bold">Hart Hagerty</div>
                    <div class="text-sm opacity-50">United States</div>
                  </div>
                </div>
              </td>
              <td>
                Zemlak, Daniel and Leannon
                <br>
                <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
              </td>
              <th>
                <button class="btn btn-ghost btn-xs">details</button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </main>


  </AppLayout>
</template>