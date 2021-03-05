<template lang="">
  <div v-if="user">
    <h1 class="text-2xl">{{ user.name }}</h1>
    <h6 class="text-gray-600" v-if="user.profile">{{ user.profile.bio }}</h6>
    <h4 class="text-xs text-gray-500">
      Joined @ <i>{{ user.created_at }}</i>
    </h4>
    <div class="px-2 mt-4" v-if="user.profile">
      <h4 class="text-lg">Basic Details</h4>
      <p class="flex flex-row text-sm">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          class="w-5 h-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"
          /></svg
        >{{ user.profile.birthday }}
      </p>
      <p class="flex flex-row text-sm">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          class="w-5 h-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
          /></svg
        >{{ user.profile.gender }}
      </p>
      <div v-if="user.profile.experiences">
        <h1 class="text-2xl mt-4">Experience</h1>
        <ul>
          <li
            class="text-md text-black"
            v-for="experience in user.profile.experiences"
            :key="experience.id"
          >
            {{ experience.company }}, {{ experience.position }}
            <i class="text-gray-600"
              >{{ experience.to }} - {{ experience.from }}</i
            >
          </li>
        </ul>
      </div>
      <div v-if="user.profile.educations">
        <div class="flex flex-row items-baseline">
          <h1 class="text-2xl mt-4 mr-2">Education</h1>
          <div v-if="($auth.user.id === user.id)">
            <a
              class="text-blue-300"
              v-on:click="showEducationModal"
              role="button"
            >
              add
            </a>
            <a
              class="text-green-300"
              v-on:click="showEditEducationModal"
              role="button"
            >
              edit
            </a>
          </div>
        </div>
        <ul>
          <li
            class="text-md text-black"
            v-for="education in user.profile.educations"
            :key="education.id"
          >
            {{ education.school }}, {{ education.course }}
            <i class="text-gray-600"
              >{{ education.to }} - {{ education.from }}</i
            >
          </li>
        </ul>
      </div>
      <div v-if="user.profile.skills">
        <h1 class="text-2xl mt-4">Skills</h1>
        <ul>
          <li
            class="text-md text-gray-600"
            v-for="skills in user.profile.skills"
            :key="skills.id"
          >
            {{ skills.title }}
          </li>
        </ul>
      </div>
    </div>
    <AppProfileAddEducation :show="getEducationModalState" />
    <AppProfileEditEducation
      :show="getEditEducationModalState"
      :educations="user.profile.educations"
    />
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import AppProfileAddEducation from "../Modal/AppProfileAddEducation.vue";
import AppProfileEditEducation from "../Modal/AppProfileEditEducation.vue";
export default {
  components: {
    AppProfileAddEducation,
    AppProfileEditEducation,
  },
  props: {
    user: {
      type: [Object, Array],
      default: "",
    },
  },
  computed: {
    ...mapGetters("utils/modal", [
      "getEducationModalState",
      "getEditEducationModalState",
    ]),
  },
  methods: {
    ...mapActions("utils/modal", [
      "setEducationVisibility",
      "setEditEducationVisibility",
    ]),
    showEducationModal() {
      this.setEducationVisibility(true);
    },
    showEditEducationModal() {
      this.setEditEducationVisibility(true);
    },
  },
};
</script>
