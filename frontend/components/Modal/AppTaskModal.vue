<template lang="">
    <div v-if="show">
        <div class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50 modal">
            <!-- modal -->
            <div class="w-1/3 bg-white rounded shadow-lg">
            <!-- modal header -->
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <h3 class="text-lg font-semibold">Post Task</h3>
                <button class="text-black close-modal" v-on:click="onCancelModal">X</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="title">Title</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" v-model="form.title" name="title" id="title">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="description">Description</label>
                    <textarea class="border text-grey-darkest"
                        rows="3" v-model="form.description" name="description" id="description"></textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="amount">Amount</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="number" min="10" step="1" v-model="form.amount" name="amount" id="amount">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="address">Address</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" v-model="form.address" name="address" id="address">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="desired_date">Desired Date</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="date" v-model="form.desired_date" name="desired_date" id="desired_date">
                </div>
            </div>
            <div class="flex items-center justify-end p-3 border-t w-100">
                <button class="px-3 py-1 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal" v-on:click="onCancelModal">Cancel</button>
                <button class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700" v-on:click="onConfirmModal">Post</button>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    show: {
      type: Boolean,
    },
  },
  data() {
    return {
      form: {
        title: "",
        description: "",
        amount: "",
        address: "",
        desired_date: "",
      },
    };
  },
  methods: {
    ...mapActions("utils/modal", ["setVisibility"]),
    ...mapActions("Tasks/task", ["addTask"]),
    onCancelModal() {
      this.setVisibility(false);
    },
    async onConfirmModal() {
      try {
        await this.$axios.$get("sanctum/csrf-cookie");
        const response = await this.$axios.$post("/api/tasks", this.form);
        this.addTask(response.data);
        this.setVisibility(false);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
