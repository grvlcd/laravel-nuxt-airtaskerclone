<template>
  <div>
    <div v-if="!$fetchState.pending" class="grid w-full grid-cols-6 p-2">
      <div class="col-span-2">
        <TasksList :tasks="getTasks"></TasksList>
      </div>
      <div class="col-span-4" v-if="getVisibility">
        <TaskDetail :task="getTask" @update="updateList"></TaskDetail>
      </div>
      <div class="col-span-4" v-else>
        <h1>Select task</h1>
      </div>
      <AppTaskModal :show="getModalState"></AppTaskModal>
    </div>
    <div v-if="$fetchState.pending">
      <p>Loading...</p>
    </div>
  </div>
</template>

<script>
import TasksList from "@/components/Tasks/TasksList.vue";
import TaskDetail from "@/components/Tasks/TaskDetail.vue";
import AppTaskModal from "@/components/Modal/AppTaskModal.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  middleware: ["auth"],
  components: {
    TasksList,
    TaskDetail,
    AppTaskModal
  },
  data() {
    return {
      error: []
    };
  },
  async fetch() {
    try {
      await this.$axios.$get("/sanctum/csrf-cookie");
      const response = await this.$axios.$get("/api/tasks");
      this.setTasks(response.data);
    } catch (error) {
      console.log(error);
    }
  },
  computed: {
    ...mapGetters("Tasks/task", ["getTask", "getTasks", "getVisibility"]),
    ...mapGetters("utils/modal", ["getModalState"])
  },
  methods: {
    ...mapActions("Tasks/task", ["setTasks", "setTask"]),
    updateList(task) {
      this.setTask(null);
      this.$fetch();
      this.setTask(task);
    }
  }
};
</script>
