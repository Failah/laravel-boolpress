<template>
  <div>
    <h3>
      {{ post.title }}
    </h3>
    <div>
      {{ post.content }}
    </div>
  </div>
</template>

<script>
export default {
  name: "PostComponent",

  props: {
    post: Object,
  },
};
</script>

<style>
</style>
