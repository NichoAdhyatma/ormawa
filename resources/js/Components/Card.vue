<template>
  <div
    class="relative group bg-base-300 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-base-100 hover:smooth-hover">
    <img class="w-20 h-20 object-cover object-center rounded-full"
      src="https://images.unsplash.com/photo-1485846234645-a62644f84728?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1159&q=80"
      alt="cinema" />
    <h4 class="text-2xl font-bold capitalize text-center"><slot name="title"/></h4>
    <p><slot name="desc"/></p>
  </div>
</template>