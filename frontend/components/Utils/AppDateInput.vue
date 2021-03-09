<template>
  <div class="flex flex-col mb-4">
    <label class="mb-2 font-bold uppercase text-md text-grey-darkest">{{
      label
    }}</label>
    <input
      type="date"
      class="px-2 py-1 border text-grey-darkest"
      v-bind="$attrs"
      :placeholder="placeholder"
      :value="formatDate(value)"
      @input="handleInput"
    />
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
    placeholder: {
      type: String,
      default: ""
    },
    value: {
      type: [String, Number, Date],
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
    },
    formatDate(date) {
      return date.split("T", 1)[0];
    }
  }
};
</script>
