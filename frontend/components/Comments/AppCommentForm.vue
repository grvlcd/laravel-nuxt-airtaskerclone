<template lang="">
  <div>
    <input
      class="w-full px-3 py-2 placeholder-black bg-gray-300 rounded-md"
      type="text"
      placeholder="Write a comment..."
      v-model="body"
      v-on:keyup.enter="onComment"
    />
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    task_id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      body: "",
    };
  },
  methods: {
    ...mapActions("Comments/comment", ["addComment"]),
    async onComment() {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$post("/api/comments", {
          body: this.body,
          task_id: this.task_id,
        });
        console.log(response);
        this.body = "";
        this.addComment(response.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
