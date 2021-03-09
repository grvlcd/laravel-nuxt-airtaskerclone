<template>
  <div class="flex flex-col mb-4">
    <label
      class="mb-2 font-bold uppercase text-md text-grey-darkest"
      for="description"
      >{{ label }}</label
    >
    <textarea
      class="border text-grey-darkest"
      :rows="rows"
      @input="handleInput"
      :value="value"
    ></textarea>
    <span class="text-sm text-red-500">{{ error }}</span>
  </div>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      default: ""
    },
    rows: {
      type: [String, Number],
      default: 3
    },
    value: {
      type: [String, Number],
      default: ""
    },
    error: {
      type: [String, Number, Array],
      default: ""
    }
  },
  methods: {
    handleInput(e) {
      this.$emit("input", e.target.value);
    }
  }
};
</script>
<style lang=""></style>
