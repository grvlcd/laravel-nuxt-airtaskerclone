<template lang="">
  <div
    id="taskcarddetail"
    class="max-w-5xl p-6 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg "
  >
    <h4
      class="flex items-center justify-center w-24 text-lg tracking-wide text-white uppercase bg-green-400 rounded-2xl"
    ></h4>
    <div>
      <div class="flex flex-row">
        <h5
          class="flex items-center justify-center flex-grow-0 w-auto h-24 text-2xl"
        >
          {{ task.title }}
        </h5>
        <div class="flex-grow"></div>
        <h4
          class="flex items-center justify-center flex-grow-0 w-24 h-24 text-xl text-white bg-green-500 rounded-full"
        >
          ${{ task.amount }}
        </h4>
      </div>
      <div v-if="task.user" class="mb-1">
        <p>
          Posted by:
          <NuxtLink class="text-lg font-semibold" :to="{ name: 'profile-slug', params: { slug: task.user.id}}">{{ task.user.name }}</NuxtLink>
        </p>
        <div v-if="task.user.id === $auth.user.id">
          <button class="bg-green-300" v-on:click="showEditModal">update</button>
          <button class="bg-red-300" v-on:click="onDelete">delete</button>
        </div>
        <div v-else>
          <button class="bg-blue-300">message</button>
        </div>
      </div>
      <div class="mb-3 d-flex flex-column">
        <div><i class="text-blue-500 fa fa-globe"></i> {{ task.address }}</div>
        <div>
          <i class="text-red-500 far fa-calendar-alt"></i>
          {{ task.desired_date }}
        </div>
        <div>
          <i class="text-yellow-500 far fa-calendar-plus"></i>
          {{ task.created_at }}
        </div>
      </div>
      <p class="mb-4 text-lg text-justify">{{ task.description }}</p>
    </div>
    <AppComments 
      v-for="comment in getComments" 
      :key="comment.id" 
      :comment="comment"
    />
    <AppTaskEditModal
        :show="getEditModalState"
        :task="task"
        @update="updateToList"
      />
    <AppCommentForm :task_id="task.id"/>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import AppTaskEditModal from "@/components/Modal/AppTaskEditModal.vue";
import AppComments from "@/components/Comments/AppComments.vue";
import AppCommentForm from "@/components/Comments/AppCommentForm.vue";
export default {
  components: {
    AppTaskEditModal,
    AppComments,
    AppCommentForm,
  },
  props: {
    task: {
      type: [Object, Array],
      required: true,
    },
  },
  computed: {
    ...mapGetters("utils/modal", ["getEditModalState"]),
    ...mapGetters("Comments/comment", ["getComments"]),
  },
  methods: {
    ...mapActions("utils/modal", ["setEditVisibility"]),
    ...mapActions("Tasks/task", ["setTask", "deleteTask"]),
    async onDelete() {
      try {
        await this.$axios.$get("sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `/api/tasks/${this.task.id}`
        );
        if (response.status == 204) {
          this.deleteTask(this.task.id);
          this.setTask(null);
        }
      } catch (error) {
        console.log(error);
      }
    },
    updateToList(task_payload) {
      this.$emit("update", task_payload);
    },
    showEditModal() {
      this.setEditVisibility(true);
    },
  },
};
</script>
<style scoped>
#taskcarddetail {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
}
</style>