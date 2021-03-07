<template lang="">
  <div>
    <div class="flex flex-col mb-4">
      <div class="flex flex-row items-baseline">
        <label
          class="flex-grow-0 mb-2 font-bold uppercase text-md text-grey-darkest"
          for="school"
          >School</label
        >
        <div class="flex-grow"></div>
        <button class="text-green-500 flex-grow-9" type="button">
          edit
        </button>
        <button class="flex-grow-0 text-red-500" type="button">
          delete
        </button>
      </div>
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="school"
        id="school"
      />
    </div>
    <div class="flex flex-col mb-4">
      <label
        class="mb-2 font-bold uppercase text-md text-grey-darkest"
        for="course"
        >Course</label
      >
      <input
        class="px-2 py-1 border text-grey-darkest"
        type="text"
        name="course"
        id="course"
      />
    </div>
    <div class="grid grid-cols-2 mb-4">
      <div class="flex flex-col">
        <label
          class="mb-2 font-bold uppercase text-md text-grey-darkest"
          for="to"
          >To</label
        >
        <input class="border text-grey-darkest" type="date" name="to" id="to" />
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
          name="from"
          id="from"
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
