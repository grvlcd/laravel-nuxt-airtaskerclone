<template lang="">
    <div class="w-2/3 p-5 m-auto mt-2 bg-gray-200 rounded-md shadow-lg">
        <ProfileCard :user="userData"/>
    </div>
</template>
<script>
import ProfileCard from "@/components/Profile/ProfileCard.vue";
export default {
  components: {
    ProfileCard,
  },
  middleware: ["ownprofile"],
  data() {
    return {
      slug: this.$route.params.slug,
      userData: [],
    };
  },
  mounted() {
    this.slug = this.$route.params.slug;
  },
  async fetch() {
    try {
      await this.$axios.$get("/sanctum/csrf-cookie");
      const response = await this.$axios.$get(`/api/profiles/${this.slug}`);
      this.userData = response.data;
    } catch (error) {
      console.log(error);
    }
  },
};
</script>
<style lang="">
</style>