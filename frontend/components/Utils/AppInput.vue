<template>
  <div class="flex flex-col mb-4">
    <label class="mb-2 font-bold uppercase text-md text-grey-darkest">{{
      label
    }}</label>
    <input
      class="px-2 py-1 border text-grey-darkest"
      v-bind="$attrs"
      :placeholder="placeholder"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
  </div>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
  },
};
</script>