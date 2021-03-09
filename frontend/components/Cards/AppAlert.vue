<template lang="">
  <div
    v-if="show"
    class="top-0 right-0 z-50 flex items-center w-1/3 px-2 py-1 m-1 font-medium text-green-100 bg-white bg-green-700 border border-green-700 rounded-md position-fixed"
  >
    <div slot="avatar">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="100%"
        height="100%"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="w-5 h-5 mx-2 feather feather-check-circle"
      >
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </div>
    <div class="flex-initial max-w-full text-xl font-normal">
      <div class="py-2">
        This is a success messsage
        <div class="text-sm font-base">
          More information about the message can be found
          <a href="/#">here</a>
        </div>
      </div>
    </div>
    <div class="flex flex-row-reverse flex-auto">
      <div>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="100%"
          height="100%"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400"
          v-on:click="show = false"
        >
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      show: true
    };
  }
};
</script>
