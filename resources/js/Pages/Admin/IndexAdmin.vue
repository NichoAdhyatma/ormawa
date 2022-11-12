<script setup>
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
import { Inertia } from "@inertiajs/inertia";


const logout = () => {
  Inertia.post(route('admin.logout'))
}

</script>

<template>
  <AdminLayouts>
    <main>
      <h1>Dashboard Admin</h1>
      <form @submit.prevent="logout">
        <button class="btn btn-primary">logout</button>
      </form>
    </main>
  </AdminLayouts>
</template>