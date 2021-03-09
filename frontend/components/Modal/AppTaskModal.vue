<template lang="">
  <div v-if="show">
    <div
      class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50 modal"
      v-on:keydown.esc="onCancelModal"
      v-on:click.self="onCancelModal"
    >
      <!-- modal -->
      <div class="w-1/3 bg-white rounded shadow-lg">
        <!-- modal header -->
        <div class="flex items-center justify-between px-4 py-2 border-b">
          <h3 class="text-lg font-semibold">Post Task</h3>
          <button class="text-black close-modal" v-on:click="onCancelModal">
            X
          </button>
        </div>
        <!-- modal body -->
        <div class="p-3">
          <ValidationObserver ref="form">
            <form @submit.prevent="onSubmit">
              <ValidationProvider
                mode="passive"
                rules="required"
                v-slot="{ errors }"
              >
                <AppInput
                  type="text"
                  label="Title"
                  v-model="form.title"
                  :error="errors[0]"
                ></AppInput>
                <span>{{ errors[0] }}</span>
              </ValidationProvider>
              <ValidationProvider
                mode="passive"
                rules="required"
                v-slot="{ errors }"
              >
                <AppTextarea
                  label="Description"
                  v-model="form.description"
                  :error="errors[0]"
                ></AppTextarea>
                <span>{{ errors[0] }}</span>
              </ValidationProvider>
              <ValidationProvider
                mode="passive"
                rules="required"
                v-slot="{ errors }"
              >
                <AppInput
                  type="number"
                  label="Amount"
                  v-model="form.amount"
                  :error="errors[0]"
                ></AppInput>
                <span>{{ errors[0] }}</span>
              </ValidationProvider>
              <ValidationProvider
                mode="passive"
                rules="required"
                v-slot="{ errors }"
              >
                <AppInput
                  type="text"
                  label="Address"
                  v-model="form.address"
                  :error="errors[0]"
                ></AppInput>
                <span>{{ errors[0] }}</span>
              </ValidationProvider>
              <ValidationProvider
                mode="passive"
                rules="required"
                v-slot="{ errors }"
              >
                <AppDateInput
                  type="date"
                  label="Desired Date"
                  v-model="form.desired_date"
                  :error="errors[0]"
                ></AppDateInput>
              </ValidationProvider>
              <div class="flex items-center justify-end p-3 border-t w-100">
                <button
                  class="px-2 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal"
                  v-on:click="onCancelModal"
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  class="px-3 text-white bg-blue-600 rounded hover:bg-blue-700"
                >
                  Post
                </button>
              </div>
            </form>
          </ValidationObserver>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AppInput from "../Utils/AppInput.vue";
import AppTextarea from "../Utils/AppTextarea.vue";
import AppDateInput from "../Utils/AppDateInput.vue";
import { mapActions } from "vuex";
export default {
  components: {
    AppInput,
    AppTextarea,
    AppDateInput
  },
  props: {
    show: {
      type: Boolean
    }
  },
  data() {
    return {
      errors: [],
      form: {
        title: "",
        description: "",
        amount: "",
        address: "",
        desired_date: ""
      }
    };
  },
  methods: {
    ...mapActions("utils/modal", ["setVisibility"]),
    ...mapActions("Tasks/task", ["addTask"]),
    onCancelModal() {
      this.setVisibility(false);
    },
    async onSubmit() {
      try {
        const response = await this.$refs.form.validate();
        if (response) {
          await this.$axios.$get("sanctum/csrf-cookie");
          const response = await this.$axios.$post("/api/tasks", this.form);
          this.addTask(response.data);
          this.setVisibility(false);
        }
      } catch (error) {
        this.errors.push(error.response.data.message);
      }
    }
  }
};
</script>
