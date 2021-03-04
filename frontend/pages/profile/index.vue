<template lang="">
  <div class="w-2/3 p-5 m-auto mt-2 bg-gray-200 rounded-md shadow-lg">
    <ProfileCard :user="$auth.user"/>
  </div>
</template>
<script>
import ProfileCard from "@/components/Profile/ProfileCard.vue";
export default {
  components: {
    ProfileCard,
  },
};
</script>
