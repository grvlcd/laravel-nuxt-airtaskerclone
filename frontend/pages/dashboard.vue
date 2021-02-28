<template>
  <div>
    <h1>{{ $auth.user.name }}</h1>
  </div>
</template>

<script>
export default {
  middleware: "auth",
};
</script>