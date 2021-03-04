<template>
  <div>
    <nav class="flex flex-wrap items-center justify-between p-4 bg-gray-800">
      <div class="flex items-center flex-shrink-0 mr-6 text-white">
        <svg
          class="w-8 h-8 mr-2 fill-current"
          width="54"
          height="54"
          viewBox="0 0 54 54"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"
          />
        </svg>
        <span class="text-xl font-semibold tracking-tight">Airtasker</span>
      </div>
      <div
        class="items-start justify-start flex-grow hidden w-full sm:flex sm:w-auto"
        v-if="$auth.loggedIn"
      >
        <nuxt-link
          :to="{ name: 'dashboard' }"
          class="block mt-4 mr-4 text-white capitalize lg:inline-block lg:mt-0"
          >Browse Tasks</nuxt-link
        >
        <a
          role="button"
          class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
          @click="showModal"
          >Post</a
        >
      </div>
      <div
        class="items-end justify-end flex-grow hidden w-full sm:flex sm:w-auto"
      >
        <div class="capitalize text-md">
          <template v-if="!$auth.loggedIn">
            <nuxt-link
              class="mr-4 text-white hover:text-white"
              :to="{ name: 'auth-login' }"
              >Login</nuxt-link
            >
            <nuxt-link
              class="mr-4 text-white hover:text-white"
              :to="{ name: 'auth-register' }"
              >Register</nuxt-link
            >
          </template>
          <template class="flex flex-row" v-if="$auth.loggedIn">
            <nuxt-link
              :to="{ name: 'profile' }"
              class="block mt-4 mr-4 text-white capitalize lg:inline-block lg:mt-0"
              >{{ $auth.user.name }}</nuxt-link
            >
            <a
              role="button"
              class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
              @click.prevent="logout()"
              >Logout</a
            >
          </template>
        </div>
      </div>
      <div class="block sm:hidden">
        <button
          class="flex items-center px-3 py-2 text-white border border-white rounded hover:text-white hover:border-white"
          @click="show = !show"
        >
          <svg
            class="w-3 h-3 fill-current"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div
        class="flex-grow block w-full lg:flex lg:items-center lg:w-auto"
        v-if="show"
      >
        <div class="text-sm lg:flex-grow">
          <template v-if="!$auth.loggedIn">
            <nuxt-link
              class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
              :to="{ name: 'auth-login' }"
              >Login</nuxt-link
            >
            <nuxt-link
              class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
              :to="{ name: 'auth-register' }"
              >Register</nuxt-link
            >
          </template>
          <template v-if="$auth.loggedIn">
            <nuxt-link
              :to="{ name: 'profile' }"
              class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
              >{{ $auth.user.name }}</nuxt-link
            >
            <a
              role="button"
              class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0"
              @click.prevent="logout()"
              >Logout</a
            >
          </template>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      show: false,
    };
  },
  // mounted() {
  //   // Register an event listener when the Vue component is ready
  //   window.addEventListener("resize", this.onResize);
  // },
  methods: {
    ...mapActions("utils/modal", ["setVisibility"]),
    // onResize(event) {
    //   this.show = false;
    // },
    async logout() {
      this.$auth.logout();
    },
    showModal() {
      this.$router.push({ name: "dashboard" });
      this.setVisibility(true);
    },
  },
  // beforeDestroy() {
  //   // Unregister the event listener before destroying this Vue instance
  //   window.removeEventListener("resize", this.onResize);
  // },
};
</script>
