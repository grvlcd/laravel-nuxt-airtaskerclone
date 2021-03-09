<template>
  <div v-if="user">
    <div class="flex flex-row items-center px-2">
      <h1 class="text-2xl">{{ user.name }}</h1>
      <button
        v-if="$auth.user.id === user.id"
        type="button"
        class="text-green-500"
      >
        edit
      </button>
    </div>
    <h6 class="text-gray-600" v-if="user.profile">
      {{ user.profile.bio }}
    </h6>
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
        <div class="flex flex-row items-baseline">
          <h1 class="mt-4 mr-2 text-2xl">Experience</h1>
          <div v-if="$auth.user.id === user.id">
            <a
              class="text-blue-300"
              v-on:click="showExperienceModal"
              role="button"
            >
              add
            </a>
            <a
              class="text-green-300"
              v-on:click="showEditExperienceModal"
              role="button"
            >
              edit
            </a>
          </div>
        </div>
        <ul>
          <li
            class="text-black text-md"
            v-for="experience in getExperiences"
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
          <h1 class="mt-4 mr-2 text-2xl">Education</h1>
          <div v-if="$auth.user.id === user.id">
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
            class="text-black text-md"
            v-for="education in getEducations"
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
        <div class="flex flex-row items-baseline">
          <h1 class="mt-4 mr-2 text-2xl">Skills</h1>
          <div v-if="$auth.user.id === user.id">
            <a class="text-blue-300" v-on:click="showSkillModal" role="button">
              add
            </a>
            <a
              class="text-green-300"
              v-on:click="showEditSkillModal"
              role="button"
            >
              edit
            </a>
          </div>
        </div>
        <ul>
          <li
            class="text-gray-600 text-md"
            v-for="skills in getSkills"
            :key="skills.id"
          >
            {{ skills.title }}
          </li>
        </ul>
      </div>
    </div>
    <AppProfileAddEducation :show="getEducationModalState" />
    <AppProfileAddExperienceModal
      :show="getExperienceModalState"
    ></AppProfileAddExperienceModal>
    <AppProfileAddSkillModal
      :show="getSkillModalState"
    ></AppProfileAddSkillModal>
    <template v-if="user.profile">
      <AppProfileEditEducation
        :show="getEditEducationModalState"
        :educations="getEducations"
      />
      <AppProfileEditExperienceModal
        :show="getEditExperienceModalState"
        :experiences="getExperiences"
      >
      </AppProfileEditExperienceModal>
      <AppProfileEditSkill :show="getEditSkillModalState" :skills="getSkills">
      </AppProfileEditSkill>
    </template>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import AppProfileAddEducation from "../Modal/AppProfileAddEducation.vue";
import AppProfileAddExperienceModal from "../Modal/AppProfileAddExperienceModal.vue";
import AppProfileEditEducation from "../Modal/AppProfileEditEducation.vue";
import AppProfileEditExperienceModal from "../Modal/AppProfileEditExperienceModal.vue";
import AppProfileAddSkillModal from "../Modal/AppProfileAddSkillModal.vue";
import AppProfileEditSkill from "../Modal/AppProfileEditSkill.vue";
export default {
  components: {
    AppProfileAddEducation,
    AppProfileEditEducation,
    AppProfileAddExperienceModal,
    AppProfileEditExperienceModal,
    AppProfileAddSkillModal,
    AppProfileEditSkill
  },
  props: {
    user: {
      type: [Object, Array],
      default: ""
    }
  },
  mounted() {
    if (this.user.profile.skills) {
      this.setSkills(this.user.profile.skills);
    }
    if (this.user.profile.experiences) {
      this.setExperiences(this.user.profile.experiences);
    }
    if (this.user.profile.educations) {
      this.setEducations(this.user.profile.educations);
    }
  },
  computed: {
    ...mapGetters("utils/modal", [
      "getEducationModalState",
      "getEditEducationModalState",
      "getEditExperienceModalState",
      "getExperienceModalState",
      "getSkillModalState",
      "getEditSkillModalState"
    ]),
    ...mapGetters("Profiles/profile", [
      "getSkills",
      "getEducations",
      "getExperiences"
    ])
  },
  methods: {
    ...mapActions("utils/modal", [
      "setEducationVisibility",
      "setEditEducationVisibility",
      "setExperienceVisibility",
      "setEditExperienceVisibility",
      "setSkillVisibility",
      "setEditSkillVisibility"
    ]),
    ...mapActions("Profiles/profile", [
      "setSkills",
      "setEducations",
      "setExperiences"
    ]),
    showEducationModal() {
      this.setEducationVisibility(true);
    },
    showSkillModal() {
      this.setSkillVisibility(true);
    },
    showEditEducationModal() {
      this.setEditEducationVisibility(true);
    },
    showExperienceModal() {
      this.setExperienceVisibility(true);
    },
    showEditExperienceModal() {
      this.setEditExperienceVisibility(true);
    },
    showEditSkillModal() {
      this.setEditSkillVisibility(true);
    }
  }
};
</script>
