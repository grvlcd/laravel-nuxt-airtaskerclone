<template lang="">
  <div v-if="show">
    <div
      class="fixed top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50 modal"
      v-on:keydown.esc="onCancelModal"
      v-on:click.self="onCancelModal"
    >
      <!-- modal -->
      <div class="w-1/3 px-2 bg-white rounded shadow-lg">
        <!-- modal header -->
        <div class="flex items-center justify-between px-4 py-2 border-b">
          <h3 class="text-lg font-semibold">Edit Skill</h3>
          <button class="text-black close-modal" v-on:click="onCancelModal">
            X
          </button>
        </div>
        <!-- modal body -->
        <div id="modal-body">
          <div
            class="flex flex-col p-3 my-3 bg-gray-300 rounded-lg "
            v-for="skill in skills"
            :key="skill.id"
          >
            <div class="flex flex-row items-baseline">
              <label
                class="flex-grow-0 mb-2 font-bold uppercase text-md text-grey-darkest"
                for="skill"
                >Skill</label
              >
              <div class="flex-grow"></div>
              <button class="flex-grow-0 text-red-500" v-on:click="deleteSkill(skill.id)" type="button">
                delete
              </button>
            </div>
            <input
              class="px-2 py-1 border text-grey-darkest"
              type="text"
              name="title"
              :value="skill.title"
              @input="form.title = $event.target.value"
              id="title"
            />
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
            v-on:click="onConfirmModal"
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
    skills: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      form: {
        title: "",
      },
    };
  },
  methods: {
    ...mapActions("utils/modal", ["setEditSkillVisibility"]),
    onCancelModal() {
      this.setEditSkillVisibility(false);
    },
    async onConfirmModal() {
      console.log(this.form);
    },
    async deleteSkill(skill_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(`/api/skills/${skill_id}`);
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
