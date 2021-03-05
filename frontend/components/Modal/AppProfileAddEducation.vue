<template lang="">
    <div v-if="show">
        <div class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50 modal" v-on:keydown.esc="onCancelModal" v-on:click.self="onCancelModal">
            <!-- modal -->
            <div class="w-1/3 bg-white rounded shadow-lg">
            <!-- modal header -->
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <h3 class="text-lg font-semibold">Add Education</h3>
                <button class="text-black close-modal" v-on:click="onCancelModal">X</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="school">School</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" name="school" id="school" >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="course">Course</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="text" name="course"
                        id="course">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="to">To</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="date"
                        name="to" id="to">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold uppercase text-md text-grey-darkest" for="from">From</label>
                    <input class="px-2 py-1 border text-grey-darkest"
                        type="date"
                        name="from" id="from">
                </div>
            </div>
            <div class="flex items-center justify-end p-3 border-t w-100">
                <button class="px-3 py-1 mr-1 text-white bg-red-600 rounded hover:bg-red-700 close-modal" v-on:click="onCancelModal">Cancel</button>
                <button class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">Submit</button>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    show: {
      type: Boolean,
    },
  },
  methods: {
    ...mapActions("utils/modal", ["setEducationVisibility"]),
    onCancelModal() {
      this.setEducationVisibility(false);
    },
  },
};
</script>
