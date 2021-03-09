<template lang="">
  <div
    v-if="show"
    class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50 modal"
    v-on:keydown.esc="onCancelModal"
    v-on:click.self="onCancelModal"
  >
    <!-- modal -->
    <div class="w-1/3 bg-white rounded shadow-lg">
      <!-- modal header -->
      <div class="flex items-center justify-between px-4 py-2 border-b">
        <h3 class="text-lg font-semibold">Add Skill</h3>
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
                label="Title"
                type="text"
                v-model="form.title"
                :error="errors[0]"
              ></AppInput>
            </ValidationProvider>
            <div class="flex items-center justify-end p-3 border-t w-100">
              <button
                class="px-3 py-1 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal"
                v-on:click="onCancelModal"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700"
              >
                Submit
              </button>
            </div>
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import AppInput from "../Utils/AppInput.vue";
export default {
  components: {
    AppInput
  },
  props: {
    show: {
      type: Boolean
    }
  },
  data() {
    return {
      form: {
        title: ""
      }
    };
  },
  methods: {
    ...mapActions("utils/modal", ["setSkillVisibility"]),
    onCancelModal() {
      this.setSkillVisibility(false);
    },
    async onSubmit() {
      try {
        const response = await this.$refs.form.validate();
        if (response) {
          await this.$axios.$get("/sanctum/csrf-cookie");
          const response = await this.$axios.$post("/api/skills", this.form);
          console.log(response);
        }
      } catch (error) {
        console.log(error.response.data.message);
      }
    }
  }
};
</script>
<style lang=""></style>
