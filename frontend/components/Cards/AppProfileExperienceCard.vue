<template lang="">
  <div class="p-3 my-3 bg-gray-300 rounded-lg">
    <ValidationObserver ref="form">
      <form @submit.prevent="onSubmit(experience.id)">
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppInput
            label="Company"
            type="text"
            v-model="form.company"
            :error="errors[0]"
          ></AppInput>
        </ValidationProvider>
        <ValidationProvider mode="passive" rules="required" v-slot="{ errors }">
          <AppInput
            label="Position"
            type="text"
            v-model="form.position"
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
            v-on:click="onDeleteExperience(experience.id)"
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
import { mapActions } from "vuex";
export default {
  components: {
    AppInput,
    AppDateInput
  },
  props: {
    experience: {
      type: [Object, Array],
      required: true
    }
  },
  data() {
    return {
      form: {
        company: this.experience.company,
        position: this.experience.position,
        to: this.experience.to,
        from: this.experience.from
      }
    };
  },
  watch: {
    experience(newData) {
      this.form.company = newData.company;
      this.form.position = newData.position;
      this.form.to = newData.to;
      this.form.from = newData.from;
    }
  },
  methods: {
    ...mapActions("Profiles/profile", ["deleteExperience"]),
    async onSubmit(experience_id) {
      try {
        const response = await this.$refs.form.validate();
        if (response) {
          await this.$axios.$get("/sanctum/csrf-cookie");
          const response = await this.$axios.$patch(
            `/api/experiences/${experience_id}`,
            this.form
          );
          console.log(response);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async onDeleteExperience(experience_id) {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$delete(
          `/api/experiences/${experience_id}`
        );
        this.deleteExperience(experience_id);
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>
