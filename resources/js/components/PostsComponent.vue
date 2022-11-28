<template>
  <div>
    <h2 class="my-3">Posts List:</h2>

    <div v-if="loading">... LOADING ALL CONTENTS, PLEASE WAIT...</div>

    <div v-else-if="errorMessage.length > 0">
      {{ errorMessage }}
    </div>

    <!-- <PostsListComponent
      v-else-if="!detail"
      :posts="posts"
      @clickedPost="showPost"
    /> -->
    <PostsListPaginatedComponent
      v-else-if="!detail"
      :paginatedPosts="posts"
      @clickedPost="showPost"
      @requestPage="loadPage"
    />

    <div v-else>
      <PostComponent :post="detail" />
      <button @click="detail = undefined">Back To Posts List</button>
    </div>
  </div>
</template>

<script>
import PostComponent from "./PostComponent.vue";
import PostsListComponent from "./PostsListComponent.vue";
import PostsListPaginatedComponent from "./PostsListPaginatedComponent.vue";

export default {
  name: "PostsComponent",
  data() {
    return {
      posts: undefined,
      detail: undefined,
      errorMessage: "",
      loading: true,
    };
  },

  components: {
    PostComponent,
    PostsListComponent,
    PostsListPaginatedComponent,
  },

  mounted() {
    console.log("test PostComponent");

    this.loadPage("/api/posts");
  },

  methods: {
    showPost(id) {
      console.log("clicked post with id:", id);

      this.loading = true;

      axios
        .get("/api/posts/" + id)
        .then((response) => {
          console.log(response);
          this.detail = response.data.success
            ? response.data.results
            : undefined;
          this.loading = false;
        })
        .catch((e) => {
          console.log("errore", e);
        });
    },

    loadPage(url) {
      axios.get(url).then(({ data }) => {
        console.log("response is: ", data);
        if (data.success) {
          this.posts = data.results;
          console.log(this.posts);
        } else {
          this.errorMessage = data.error;
        }
        this.loading = false;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
