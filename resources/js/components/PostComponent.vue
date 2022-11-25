<template>
  <div>
    <h3>
      {{ post.title }}
    </h3>
    <div>
      {{ post.content }}
    </div>
    <div v-if="post.cover_path">
      <img :src="post.cover_path" :alt="post.title" />
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
