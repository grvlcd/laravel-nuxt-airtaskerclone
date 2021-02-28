<template>
  <div class="flex items-center w-1/2 m-auto">
    <div class="w-full p-8 m-4 bg-white rounded shadow-2xl">
      <div class="" v-if="errors">
        <ul v-for="error in errors" :key="error.id">
          <li>{{ error }}</li>
        </ul>
      </div>
      <form class="mb-4" method="post" @submit.prevent="onSubmit">
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
        <button
          class="block px-3 py-1 mx-auto mb-2 text-lg text-white uppercase bg-orange-500 rounded bg-teal hover:bg-orange-800"
          type="submit"
        >
          Login
        </button>
        <a
          class="block w-full text-sm text-center no-underline text-grey-dark hover:text-grey-darker"
          href="#"
          >Forgot password?</a
        >
      </form>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "guest",
  data() {
    return {
      errors: [],
      form: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    onSubmit() {
      this.$auth
        .loginWith("laravelSanctum", {
          data: this.form,
        })
        .catch((error) => {
          this.errors.push(error.message);
        });
    },
  },
};
</script>