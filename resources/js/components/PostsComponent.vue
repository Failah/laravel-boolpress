<template>
  <div>
    <h2 class="my-3">Posts List:</h2>

    <div v-if="loading">... LOADING ALL CONTENTS, PLEASE WAIT...</div>

    <div v-else-if="errorMessage.length > 0">
      {{ errorMessage }}
    </div>

    <PostsListComponent
      v-else-if="!detail"
      :posts="posts"
      @clickedPost="showPost"
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

export default {
  name: "PostsComponent",
  data() {
    return {
      posts: [],
      detail: undefined,
      errorMessage: "",
      loading: true,
    };
  },

  components: {
    PostComponent,
    PostsListComponent,
  },

  mounted() {
    console.log("test PostComponent");

    axios.get("/api/posts").then(({ data }) => {
      console.log("response is: ", data);
      if (data.success) {
        this.posts = data.results;
      } else {
        this.errorMessage = data.error;
      }
      this.loading = false;
    });
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
  },
};
</script>

<style lang="scss" scoped>
</style>
