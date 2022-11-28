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

      <!-- navigation buttons for posts pages -->
      <div class="row my-5 mx-3">
        <button @click="go(paginatedPosts.prev_page_url)">Previous Page</button>
        <div class="mx-5">{{ currentPage }} / {{ totalPages }}</div>
        <button @click="go(paginatedPosts.next_page_url)">Next Page</button>
      </div>
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
    currentPage() {
      return this.paginatedPosts.current_page;
    },
    totalPages() {
      return this.paginatedPosts.last_page;
    },
  },

  props: {
    paginatedPosts: Object,
  },

  methods: {
    showPost(id) {
      this.$emit("clickedPost", id);
    },

    go(url) {
      this.$emit("requestPage", url);
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
