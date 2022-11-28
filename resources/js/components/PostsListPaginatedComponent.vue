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
        <button
          :class="{ disabled: currentPage === 1 }"
          @click="go(paginatedPosts.first_page_url)"
        >
          First Page
        </button>
        <button
          :class="{ disabled: !paginatedPosts.prev_page_url }"
          @click="go(paginatedPosts.prev_page_url)"
        >
          Previous Page
        </button>
        <div class="mx-5">{{ currentPage }} / {{ totalPages }}</div>
        <button
          :class="{ disabled: !paginatedPosts.next_page_url }"
          @click="go(paginatedPosts.next_page_url)"
        >
          Next Page
        </button>
        <button
          :class="{ disabled: currentPage === totalPages }"
          @click="go(paginatedPosts.last_page_url)"
        >
          Last Page
        </button>
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

button {
  margin: 0px 10px;
}

.disabled {
  opacity: 0.5;
  pointer-events: none;
}
</style>
