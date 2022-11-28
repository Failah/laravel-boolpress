<template>
  <div>
    <div v-if="posts.length > 0">
      <ul>
        <li v-for="post in posts" :key="post.id">
          <h4 @click="showPost(post.id)">
            {{ post.title }}
          </h4>
        </li>
      </ul>
    </div>

    <div v-else>No Posts to be displayed!</div>
  </div>
</template>

<script>
export default {
  name: "PostsListPaginatedComponent",

  computed: {
    posts() {
      return this.paginatedPosts.data;
    },
  },

  props: {
    paginatedPosts: Object,
  },

  methods: {
    showPost(id) {
      this.$emit("clickedPost", id);
    },
  },
};
</script>

<style lang="scss" scoped>
h4 {
  cursor: pointer;

  &:hover {
    color: rgb(25, 72, 88);
    text-decoration: underline;
  }
}
</style>
