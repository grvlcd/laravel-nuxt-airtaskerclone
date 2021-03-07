<template lang="">
  <div>
    <div class="flex flex-col mb-4">
      <div class="flex flex-row items-baseline">
        <label
          class="flex-grow-0 mb-2 font-bold uppercase text-md text-grey-darkest"
          for="company"
          >Company</label
        >
        <div class="flex-grow"></div>
        <button
          class="text-green-500 flex-grow-9"
          type="button"
          v-on:click="updateExperience(experience.id)"
        >
          edit
        </button>
        <button
          class="flex-grow-0 text-red-500"
          v-on:click="deleteExperience(experience.id)"
          type="button"
        >
          delete
        </button>
      </div>
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="company"
        :value="experience.company"
        @input="form.company = $event.target.value"
        id="company"
      />
    </div>
    <div class="flex flex-col mb-4">
      <label
        class="mb-2 font-bold uppercase text-md text-grey-darkest"
        for="position"
        >Position</label
      >
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="position"
        :value="experience.position"
        @input="form.position = $event.target.value"
        id="position"
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
          :value="formatDate(experience.to)"
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
          :value="formatDate(experience.from)"
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
    experience: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      form: {
        company: "",
        position: "",
        to: "",
        from: "",
      },
    };
  },
  mounted() {
    this.form.company = this.experience.company;
    this.form.position = this.experience.position;
    this.form.from = this.experience.from;
    this.form.to = this.experience.to;
  },
  methods: {
    formatDate(date) {
      return date.split("T", 1)[0];
    },
    async updateExperience(experience_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$patch(
          `/api/experiences/${experience_id}`,
          this.form
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
    async deleteExperience(experience_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `/api/experiences/${experience_id}`
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<style lang=""></style>
