<template lang="">
  <div class="p-3 my-3 bg-gray-300 rounded-lg">
    <div class="flex flex-col mb-4">
      <div class="flex flex-row items-baseline">
        <label
          class="flex-grow-0 mb-2 font-bold uppercase text-md text-grey-darkest"
          for="school"
          >School</label
        >
        <div class="flex-grow"></div>
        <button
          class="text-green-500 flex-grow-9"
          type="button"
          v-on:click="updateEducation(education.id)"
        >
          edit
        </button>
        <button
          class="flex-grow-0 text-red-500"
          type="button"
          v-on:click="deleteEducation(education.id)"
        >
          delete
        </button>
      </div>
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="school"
        :value="education.school"
        @input="form.school = $event.target.value"
        id="school"
      />
    </div>
    <div class="flex flex-col mb-4">
      <label
        class="mb-2 font-bold uppercase text-md text-grey-darkest"
        for="course"
        >Course</label
      >
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="course"
        :value="education.course"
        @input="form.course = $event.target.value"
        id="course"
      />
    </div>
    <div class="grid grid-cols-2 mb-4">
      <div class="flex flex-col">
        <label
          class="mb-2 font-bold uppercase text-md text-grey-darkest"
          for="to"
          >To</label
        >
        <input
          class="border text-grey-darkest"
          type="date"
          :value="formatDate(education.to)"
          @input="form.to = $event.target.value"
          name="to"
          id="to"
        />
      </div>
      <div class="flex flex-col">
        <label
          class="mb-2 font-bold uppercase text-md text-grey-darkest"
          for="from"
          >From</label
        >
        <input
          class="border text-grey-darkest"
          type="date"
          :value="formatDate(education.from)"
          @input="form.from = $event.target.value"
          name="from"
          id="from"
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    education: [Object, Array],
    required: true,
  },
  data() {
    return {
      form: {
        school: "",
        course: "",
        to: "",
        from: "",
      },
    };
  },
  mounted() {
    this.form.school = this.education.school;
    this.form.course = this.education.course;
    this.form.to = this.education.to;
    this.form.from = this.education.from;
  },
  methods: {
    formatDate(date) {
      return date.split("T", 1)[0];
    },
    async updateEducation(education_id) {
      try {
        await this.$axios.$get("sanctum/csrf-cookie");
        const response = await this.$axios.$patch(
          `/api/educations/${education_id}`,
          this.form
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
    async deleteEducation(education_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `/api/educations/${education_id}`
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
