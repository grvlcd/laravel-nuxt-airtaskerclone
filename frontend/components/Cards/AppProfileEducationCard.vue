<template lang="">
  <div class="p-3 my-3 bg-gray-300 rounded-lg">
    <ValidationObserver ref="form">
      <form @submit.prevent="onSubmit(education.id)">
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppInput
            label="School"
            type="text"
            v-model="form.school"
            :error="errors[0]"
          ></AppInput>
        </ValidationProvider>
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppInput
            label="Course"
            type="text"
            v-model="form.course"
            :error="errors[0]"
          ></AppInput>
        </ValidationProvider>
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppDateInput
            label="To"
            type="date"
            v-model="form.to"
            :error="errors[0]"
          ></AppDateInput>
        </ValidationProvider>
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppDateInput
            label="From"
            type="date"
            v-model="form.from"
            :error="errors[0]"
          ></AppDateInput>
        </ValidationProvider>
        <div class="flex flex-row items-baseline">
          <button
            class="flex-grow-0 text-red-500"
            v-on:click="deleteEducation(education.id)"
            type="button"
          >
            delete
          </button>
          <button class="text-green-500 flex-grow-9" type="submit">
            edit
          </button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>
<script>
import AppInput from "../Utils/AppInput.vue";
import AppDateInput from "../Utils/AppDateInput.vue";
export default {
  components: {
    AppInput,
    AppDateInput
  },
  props: {
    education: [Object, Array],
    required: true
  },
  data() {
    return {
      form: {
        school: this.education.school,
        course: this.education.course,
        to: this.education.to,
        from: this.education.from
      }
    };
  },
  watch: {
    education(newData) {
      this.form.school = newData.school;
      this.form.course = newData.course;
      this.form.to = newData.to;
      this.form.from = newData.from;
    }
  },

  methods: {
    async onSubmit(education_id) {
      try {
        const response = await this.$refs.form.validate();
        if (response) {
          await this.$axios.$get("sanctum/csrf-cookie");
          const response = await this.$axios.$patch(
            `/api/educations/${education_id}`,
            this.form
          );
          console.log(response);
        }
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
    }
  }
};
</script>
