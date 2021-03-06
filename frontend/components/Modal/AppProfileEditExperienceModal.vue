<template lang="">
  <div v-if="show">
    <div
      class="fixed top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50"
      v-on:keydown.esc="onCancelModal"
      v-on:click.self="onCancelModal"
    >
      <!-- modal -->
      <div class="w-1/3 px-2 bg-white rounded shadow-lg">
        <!-- modal header -->
        <div class="flex items-center justify-between px-4 py-2 border-b">
          <h3 class="text-lg font-semibold">Edit Experiences</h3>
          <button class="text-black close-modal" v-on:click="onCancelModal">
            X
          </button>
        </div>
        <!-- modal body -->
        <div id="modal-body">
          <div
            class="p-3 my-3 bg-gray-300 rounded-lg"
            v-for="experience in experiences"
            :key="experience.id"
          >
            <div class="flex flex-col mb-4">
              <div class="flex flex-row items-baseline">
                <label
                  class="flex-grow-0 mb-2 font-bold uppercase text-md text-grey-darkest"
                  for="company"
                  >Company</label
                >
                <div class="flex-grow"></div>
                <button class="flex-grow-0 text-red-500" v-on:click="deleteExperience(experience.id)" type="button">delete</button>
              </div>
              <input
                class="px-2 py-1 border text-grey-darkest"
                type="text"
                name="company"
                :value="experience.company"
                id="company"
              />
            </div>
            <div class="flex flex-col mb-4">
              <label
                class="mb-2 font-bold uppercase text-md text-grey-darkest"
                for="position"
                >Position</label
              >
              <input
                class="px-2 py-1 border text-grey-darkest"
                type="text"
                name="position"
                :value="experience.position"
                id="position"
              />
            </div>
            <div class="grid grid-cols-2 mb-4">
              <div class="flex flex-col">
                <label
                  class="mb-2 font-bold uppercase text-md text-grey-darkest"
                  for="to"
                  >To</label
                >
                <input
                  class="border text-grey-darkest"
                  type="date"
                  :value="formatDate(experience.to)"
                  name="to"
                  id="to"
                />
              </div>
              <div class="flex flex-col">
                <label
                  class="mb-2 font-bold uppercase text-md text-grey-darkest"
                  for="from"
                  >From</label
                >
                <input
                  class="border text-grey-darkest"
                  type="date"
                  :value="formatDate(experience.from)"
                  name="from"
                  id="from"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-end p-3 border-t w-100">
          <button
            class="px-3 py-1 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal"
            v-on:click="onCancelModal"
          >
            Cancel
          </button>
          <button
            class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700"
          >
            Submit
          </button>
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
    experiences: {
      type: [Object, Array],
      required: true,
    },
  },
  methods: {
    ...mapActions("utils/modal", ["setEditExperienceVisibility"]),
    formatDate(date) {
      return date.split("T", 1)[0];
    },
    onCancelModal() {
      this.setEditExperienceVisibility(false);
    },
    async deleteExperience(experience_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `api/experiences/${experience_id}`
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<style scoped>
#modal-body {
  overflow-y: auto !important;
  height: 80vh;
}
</style>
