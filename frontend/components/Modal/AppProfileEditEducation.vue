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
          <h3 class="text-lg font-semibold">Edit Education</h3>
          <button class="text-black close-modal" v-on:click="onCancelModal">
            X
          </button>
        </div>
        <!-- modal body -->
        <div id="modal-body">
          <div
            v-for="education in educations"
            :key="education.id"
          >
            <AppProfileEducationCard :education="education"/>
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
import AppProfileEducationCard from "../Cards/AppProfileEducationCard.vue";
export default {
  components: {
    AppProfileEducationCard,
  },
  props: {
    show: {
      type: Boolean,
    },
    educations: {
      type: [Object, Array],
      required: true,
    },
  },
  methods: {
    ...mapActions("utils/modal", ["setEditEducationVisibility"]),

    onCancelModal() {
      this.setEditEducationVisibility(false);
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
