<template>
  <div class="text-2xl my-5">
    <slot name="judul"/>
  </div>
  <div class="overflow-hidden w-3/4 max-w-xs sm:max-w-none sm:w-full mx-auto">
    <slot name="table" />
  </div>
</template>