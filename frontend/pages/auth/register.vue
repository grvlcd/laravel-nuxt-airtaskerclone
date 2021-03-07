<template>
  <div class="flex items-center w-1/2 m-auto">
    <div class="w-full p-8 m-4 bg-white rounded shadow-2xl">
      <form class="mb-4" method="post" @submit.prevent="onSubmit">
        <div class="flex flex-col mb-4">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="name"
            >Name</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="text"
            name="name"
            v-model="form.name"
            id="name"
          />
        </div>
        <div class="flex flex-col mb-4">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="age"
            >Age</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="number"
            name="age"
            v-model="form.age"
            id="age"
          />
        </div>
        <div class="flex flex-col mb-4">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="birthday"
            >Birthday</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="date"
            name="birthday"
            v-model="form.birthday"
            id="birthday"
          />
        </div>
        <div class="flex flex-col mb-4">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="gender"
            >Gender</label
          >
          <select v-model="form.gender" name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="flex flex-col mb-4">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="email"
            >Email</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="email"
            name="email"
            v-model="form.email"
            id="email"
          />
        </div>
        <div class="flex flex-col mb-6">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="password"
            >Password</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="password"
            name="password"
            v-model="form.password"
            id="password"
          />
        </div>
        <div class="flex flex-col mb-6">
          <label
            class="mb-2 text-lg font-bold uppercase text-grey-darkest"
            for="password_confirmation"
            >Confirm Password</label
          >
          <input
            class="px-3 py-2 border text-grey-darkest"
            type="password"
            name="password_confirmation"
            v-model="form.password_confirmation"
            id="password_confirmation"
          />
        </div>
        <button
          class="block px-3 py-1 mx-auto mb-2 text-lg text-white uppercase bg-orange-500 rounded bg-teal hover:bg-orange-800"
          type="submit"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "guest",
  data() {
    return {
      form: {
        name: "",
        age: "",
        birthday: "",
        email: "",
        password: "",
        password_confirmation: "",
        gender: "",
      },
    };
  },
  methods: {
    async onSubmit() {
      try {
        await this.$axios.$get("/sanctum/csrf-cookie");
        const response = await this.$axios.$post("/api/register", this.form);
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>