<template lang="">
    <div v-if="show">
        <div class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50 modal">
            <!-- modal -->
            <div class="w-1/3 bg-white rounded shadow-lg">
            <!-- modal header -->
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <h3 class="text-lg font-semibold">Edit Task</h3>
                <button class="text-black close-modal" v-on:click="onCancelModal">X</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="title">Title</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" :value="task.title" name="title" id="title" @input="form.title = $event.target.value">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="description">Description</label>
                    <textarea class="border text-grey-darkest"
                        rows="3" name="description" 
                        @input="form.description = $event.target.value"
                        id="description">{{task.description}}</textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="amount">Amount</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="number" :value="task.amount" min="10" step="1" 
                        @input="form.amount = $event.target.value"
                        name="amount" id="amount">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="address">Address</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" :value="task.address" name="address" 
                        @input="form.address = $event.target.value"
                        id="address">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="desired_date">Desired Date</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="date" :value="formatDate(task.desired_date)" 
                        @input="form.desired_date = $event.target.value"
                        name="desired_date" id="desired_date">
                </div>
            </div>
            <div class="flex items-center justify-end p-3 border-t w-100">
                <button class="px-3 py-1 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal" v-on:click="onCancelModal">Cancel</button>
                <button class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700" v-on:click="onConfirmEdit">Post</button>
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
    task: {
      type: [Object, Array],
      required: true,
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
  mounted() {
    this.form.title = this.task.title;
    this.form.description = this.task.description;
    this.form.amount = this.task.amount;
    this.form.address = this.task.address;
    this.form.desired_date = this.task.desired_date;
  },
  methods: {
    ...mapActions("utils/modal", ["setEditVisibility"]),
    ...mapActions("Tasks/task", ["updateTask", "setTask"]),
    formatDate(date) {
      return date.split("T", 1)[0];
    },
    onCancelModal() {
      this.setEditVisibility(false);
    },
    async onConfirmEdit() {
      try {
        await this.$axios.get("/sanctum/csrf-cookie");
        const response = await this.$axios.$patch(
          `/api/tasks/${this.task.id}`,
          this.form
        );
        console.log(response.data);
        this.setTask(null);
        this.updateTask(response.data);
        this.setEditVisibility(false);
        this.$emit("update", response.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
