<template>
  <div
    class="w-full p-6 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg cursor-pointer hover:shadow-2xl"
    v-on:click="onSetTask"
  >
    <div class="card-header">
      <div class="flex flex-row">
        <h1 class="flex-grow-0 text-md">{{ task.title }}</h1>
        <div class="flex-grow"></div>
        <h6 class="flex-grow-0 text-2xl">${{ task.amount }}</h6>
      </div>
    </div>
    <div class="flex flex-col mt-2 card-body">
      <div class="flex flex-row items-center">
        <button type="button" disabled class="w-5 h-5 mr-2 text-blue-500">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
        <p>{{ task.address }}</p>
      </div>
      <div class="flex flex-row items-center">
        <button type="button" disabled class="w-5 h-5 mr-2 text-red-500">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
        <p>{{ task.desired_date }}</p>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    task: [Object, Array],
    required: true,
  },
  methods: {
    ...mapActions("Tasks/task", ["setTask"]),
    ...mapActions("Comments/comment", ["setComments"]),
    onSetTask() {
      this.setTask(this.task);
      this.setComments(this.task.comments);
    },
  },
};
</script>
