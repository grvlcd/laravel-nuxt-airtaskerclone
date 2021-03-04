<template lang="">
    <div class="flex flex-col px-2 py-1 mb-2 bg-gray-300 rounded-lg">
      <NuxtLink class="font-medium" :to="{ name: 'profile-slug', params: { slug: comment.user.id}}">{{ comment.user.name }}</NuxtLink>
      <i class="text-sm font-light text-gray-500">{{comment.created_at}}</i>
      <p class="text-sm">- {{comment.body}}</p>
      <div v-if="$auth.user.id === comment.user.id">
        <button type="button" class="w-10 text-green-500" v-on:click="onEdit">edit</button>
        <button type="button" class="w-10 text-red-500" v-on:click="onDelete">delete</button> 
      </div>
    </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    comment: {
      type: [Object, Array],
    },
  },
  methods: {
    ...mapActions("Comments/comment", ["deleteComment"]),
    async onDelete() {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `/api/comments/${this.comment.id}`
        );
        if (response.status === 204) {
          this.deleteComment(this.comment.id);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async onEdit() {
      console.log("edit");
    },
  },
};
</script>