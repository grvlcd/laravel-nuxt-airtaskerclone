<template>
  <div class="w-full">
    <TaskCard v-for="task in tasks" :key="task.id" :task="task"></TaskCard>
  </div>
</template>
<script>
import TaskCard from "./TaskCard.vue";
export default {
  components: {
    TaskCard,
  },
  props: {
    tasks: [Object, Array],
    required: true,
  },
};
</script>